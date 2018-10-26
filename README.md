# Symfony
Repositório referente ao curso: https://symfonycasts.com/screencast/symfony.

## Plugins Instalados
```shell
annotation
sec-checker
twig
debug
debug-pack
asset
```

Observação: O pacote debug-pack na verdade é um arquivo composer.json contendo várias dependências juntas. Caso queiramos editar alguma delas, basta utilizarmos o comando `composer unpack debug-pack`. Dessa forma, as dependências agrupadas serão diretamente inseridas no projeto.

## Como Funciona
O Symfony por meio do Flex, consegue implementar aliases para seus pacotes, dessa forma, ao invés de por exemplo termos que digitar `composer require symfony/twig-bundle` podemos instalar a dependência apenas com o `composer require twig`.
Para verificar as `Receitas` que podem ser baixadas, acesse o link: https://symfony.sh/.

## Receitas
Receitas/Recipes, são literalmente receitas, que permitem a configuração automática se plugins.


## Regra Única para Controllers Symfony
Devem retornar um Symfony Response Object!

## Logs
Logs são automaticamente salvos pelo Symfony em`var/log/dev.log`. Para gerarmos um Log manualmente, basta passarmos a classe **LoggerInterface** como parâmetro de um método e chamar o método *info()*.
Ex:
```php
/**
 * @Route("/news/{slug}/heard", name="article_toggle_heart", methods={"POST"})
 */
public function toggleArticleHeart($slug, LoggerInterface $logger)
{
    $logger->info('Article is being hearted');
    return new JsonResponse(['hearts' => rand(5, 100)]);
}
```

Mas, como isso funciona?
Bem, antes do Symfony executar nosso Controller, ele irá verificar todos nossos argumentos. Para argumentos simples como $slug, ele nos passa o **wildcard** da rota. Porém, para $logger, ele verificará o tipo e perceberá que queremos acessar o objeto de logger.

Para isso, a ordem dos objetos não importa!

Esse conceito é chamado de **autowiring**.

Importante: Podemos utilizar o comando `./bin/console debug:autowiring` para visualizar
uma lista com todos os Services que podem ser passados ao Controller pelo autowiring.

## Twig (Anotações)
Documento: https://twig.symfony.com/doc/2.x/

- {# #} Comentários
- {{ }} Exibição
- {%% } Lógica

Quando tivermos arquivos estáticos, devemos chamá-los pela função asset() do Twig. Não irá haver nenhuma diferença atual, mas irá facilitar nossa vida no futuro.
Ex: `{{ asset('/css/styles.css') }}`


## Gerar links de rota dinâmica
Cada rota que criamos no Symfony, possuí uma identificação interna única, podemos capturar essa identificação e utilizá-la para capturar o PATH da rota no Twig. Isso é extremamente útil pois caso a rota seja alterado, não precisaremos fazer nenhuma alteração no código.

Para capturar o identificador interno da roda, execute o comando: `./bin/console debug:router`.
```shell
$ ./bin/console debug:router

 -------------------------- -------- -------- ------ -----------------------------------
  Name                       Method   Scheme   Host   Path
 -------------------------- -------- -------- ------ -----------------------------------
  app_article_homepage       ANY      ANY      ANY    /
  app_article_show           ANY      ANY      ANY    /news/{slug}
  _twig_error_test           ANY      ANY      ANY    /_error/{code}.{_format}
  _wdt                       ANY      ANY      ANY    /_wdt/{token}
  _profiler_home             ANY      ANY      ANY    /_profiler/
  _profiler_search           ANY      ANY      ANY    /_profiler/search
  _profiler_search_bar       ANY      ANY      ANY    /_profiler/search_bar
  _profiler_phpinfo          ANY      ANY      ANY    /_profiler/phpinfo
  _profiler_search_results   ANY      ANY      ANY    /_profiler/{token}/search/results
  _profiler_open_file        ANY      ANY      ANY    /_profiler/open
  _profiler                  ANY      ANY      ANY    /_profiler/{token}
  _profiler_router           ANY      ANY      ANY    /_profiler/{token}/router
  _profiler_exception        ANY      ANY      ANY    /_profiler/{token}/exception
  _profiler_exception_css    ANY      ANY      ANY    /_profiler/{token}/exception.css
  index                      ANY      ANY      ANY    /
 -------------------------- -------- -------- ------ -----------------------------------
```

Coluna **Name**.

Para capturarmos a rota referente à esse identificador, utilizamos o comando `{{ path(_identificador_) }}`.
Exemplo: 
```html
<a style="margin-left: 75px;" class="navbar-brand space-brand" href="{{ path('app_article_homepage') }}">The Space Bar</a>
```


**PORÉM**, esta abordagem não é segura pois caso mudemos certas partes do código, o identificador único pode ser alterado. Para não haver erro, podemos criar o identificador na própria configuração da rota, passando o atributo `name="_identificador_"`.

Exemplo com Annotation:
```php
/**
 * @Route("/", name="app_homepage")
 */
public function homepage()
{
    return new Response('OMG! My first page already! Wooo!');
}
```

A função `path()` também aceita um segundo argumento, que irá enviar os parâmetros da rota. Exemplo:
```twig
* @Route("/news/{slug}", name="article_show")
=> {{ path('article_show', { slug: 'why-asteroids-taste-like-bacon'}) }}
```

## Como executar o projeto
Requisitos
- Docker
- Docker-compose

```shell
git clone https://github.com/rogerzanelato/curso_symfony_stellar.git

cd curso_symfony_stellar

docker-compose up

docker exec -it -u dev sf4_php bash
cd sf4
composer install
```

**Após configurar o ambiente, abrir no navegador a URL: http://127.0.0.1:82**.