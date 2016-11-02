#!/usr/bin/env ruby

require 'net/https'
require 'open-uri'
require 'uri'
require 'mechanize'


@agent = Mechanize.new

# Por curso

def download_por_curso

  puts
  puts '-------------------'
  puts ' Por curso'
  puts '-------------------'

  index = StringIO.new

  page = @agent.get('https://supac.ufba.br/aluno')
  areas_page = @agent.click(page.link_with(text: 'Curso - Graduação'))
  areas = areas_page.xpath("(//*[contains(@class, 'field-name-body')])[last()]//*[contains(@class, 'field-item ')]//li//a").map { |link| {
        text: link.text,
        url: URI.join(areas_page.uri, link['href'])
    } }

  areas.each do |area|
    area_name = area[:text]
    area_url = area[:url]
    puts "\n# #{area_name}"

    index.puts "<h2>#{area_name}</h2>"
    cursos_page = @agent.get(area_url)
    cursos = cursos_page.xpath("(//*[contains(@class, 'field-name-body')])[last()]//*[contains(@class, 'field-item ')]//a").select { |link| link.text.downcase != 'voltar' }.map { |link| {
        text: link.text,
        url: URI.join(areas_page.uri, link['href'])
    } }
    cursos.each do |curso|
      curso_name = curso[:text]
      curso_url = curso[:url]
      puts "- #{curso_name}"

      curso_code = nil
      if curso_url.to_s =~ %r{.*/(\d\d\d).*[.]htm?}
        curso_code = $1
      else
        raise RuntimeError, "Code not found for URL #{curso_url}"
      end
      @agent.get(curso_url).save!("../php/guia/#{curso_code}.html")
      index.puts %Q{<a href="mostramaterias.php?curso=#{curso_code}">#{curso_name}</a> &nbsp; }
    end
  end

  s = index.string.encode('iso-8859-1', 'utf-8')
  File.open('../php/listacursos.htm', 'w') { |f| f.write(s) }
end

# Por unidade

def download_por_unidade
  puts '-------------------'
  puts ' Por unidade'
  puts '-------------------'

  unidade_options = []

  page = @agent.get('https://supac.ufba.br/aluno')
  unidades_page = @agent.click(page.link_with(text: 'Unidade Universitária - Graduação'))
  unidades = unidades_page.xpath("(//*[contains(@class, 'field-name-body')])[last()]//*[contains(@class, 'field-item ')]//table//a").map { |link| {
        text: link.text,
        url: URI.join(unidades_page.uri, link['href'])
    } }
  unidades.each do |unidade|
    unidade_name = unidade[:text]
    unidade_url = unidade[:url]
    
    unidade_code = nil
    if unidade_url.to_s =~ %r{.*/([a-zA-Z]{3}).*[.]htm?}
      unidade_code = $1.upcase
    else
      raise RuntimeError, "Code not found for URL #{unidade_url}"
    end

    puts "- #{unidade_code} - #{unidade_name}"

    unidade_options << {code: unidade_code, name: unidade_name}
    @agent.get(unidade_url).save!("../php/guia/#{unidade_code}.html")
  end

  s = unidade_options
        .sort_by { |und| und[:name] }
        .map { |und| %Q{<option value="#{und[:code]}">#{und[:name]}</option>} }
        .join("\n")
        .encode('iso-8859-1', 'utf-8')
  File.open('../php/option_curso.inc', 'w') { |f| f.write(s) }
end

download_por_curso
download_por_unidade
