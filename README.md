# meuhorario

Site de simulação de matrícula em <http://meuhorario.dcc.ufba.br/>.

Criado por Rodrigo Rocha no terceiro semestre da graduação, em 2004. Veja também a [lista de contribuidores](https://github.com/rodrigorgs/meuhorario/graphs/contributors).

Hospedado pelo [Graco](http://graco.dcc.ufba.br/).

## Dependências

Para executar o meuhorario só é necessário o PHP. Não é necessário nenhum sistema de banco de dados.

Para atualizar os guias de matrícula através do script é necessário o Ruby.

## Instalação

Para instalar a aplicação, simplesmente mova o conteúdo da pasta `php/` para a pasta do servidor web.

Outra opção é rodar um servidor web embutido. Isso pode ser feito com o comando `php -S localhost:8000` (execute a partir da pasta `php/`). Essa opção não é recomendada para produção, mas é adequada para desenvolvimento.

Uma outra opção é instalar em algum servidor de plataforma como serviço (PaaS). O meuhorario possui arquivos de configuração para o [OpenShift](https://www.openshift.com/).

## Atualização de guia de matrícula

Todo o semestre é necessário atualizar o guia de matrícula com a nova grade de disciplinas. Para isso é necessário atualizar o arquivo `ruby/atualizaguia.rb` com as novas URLs dos guias de matrícula (veja o código-fonte do arquivo para mais informações) e então executar o arquivo a partir da pasta `ruby/`.
