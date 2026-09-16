# Convenções de Código

## PHP

* **Padrão**: estilo de código PSR-12
* **Declarações de tipo**: Use declarações de tipo do PHP 8.3 (tipos de parâmetros, tipos de retorno, tipos de propriedades)
* **Tipos estritos**: Todos os arquivos PHP devem declarar `strict_types=1`
* **Namespaces**: Siga o autoloading PSR-4 (ex.: `Chamilo\CoreBundle\Entity\User`)
* **Padrões Symfony**: Siga os padrões de código e as melhores práticas do Symfony

## JavaScript/Vue

* **ESLint + Prettier**: O código é analisado com ESLint e formatado com Prettier; a configuração está em `eslint.config.mjs` na raiz do projeto. O `prettier-plugin-tailwindcss` também está habilitado para ordenação automática das classes Tailwind.
* **Composition API**: Use a sintaxe `<script setup>` do Vue 3 para novos componentes
* **TypeScript**: TypeScript é suportado; use-o para código com segurança de tipos

## CSS

* **Tailwind CSS**: Prefira classes utilitárias a CSS personalizado
* **Nomenclatura BEM**: Quando for necessário CSS personalizado, use a convenção de nomenclatura BEM
* **SCSS**: Use SCSS para folhas de estilo complexas

## Análise Estática PHP e Ferramentas de Refatoração

O projeto inclui configuração para três ferramentas adicionais:

| Ferramenta | Arquivo de configuração | Finalidade |
|------|------------|---------|
| **PHPStan** | `phpstan.neon` | Análise estática (nível 5, analisa `src/` e diretórios de teste) |
| **Psalm** | `psalm.xml` | Segunda passagem de análise estática; executa no CI a cada push |
| **Rector** | `rector.php` | Transformações e atualizações automatizadas de código |

Execute-as por meio dos atalhos do Composer: `composer phpstan`, `composer psalm`. Consulte [Testes](../contributing/testing.md) para os comandos completos.

## Geral

* **Inglês**: Todos os comentários de código, nomes de variáveis e a documentação devem estar em inglês
* **Traduções**: Todo o texto visível ao usuário deve usar o sistema de tradução (Vue I18n no frontend, Symfony Translator no backend)
* **Sem valores mágicos**: Use constantes ou enums em vez de valores literais fixos