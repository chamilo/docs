# Convenções de Codificação

## PHP

* **Padrão**: estilo de codificação PSR-12
* **Declarações de tipo**: Utilize declarações de tipo do PHP 8.3 (tipos de parâmetros, tipos de retorno, tipos de propriedades)
* **Tipos estritos**: Todos os ficheiros PHP devem declarar `strict_types=1`
* **Namespaces**: Siga o autoloading PSR-4 (p. ex., `Chamilo\CoreBundle\Entity\User`)
* **Padrões Symfony**: Siga as normas de codificação e as boas práticas do Symfony

## JavaScript/Vue

* **ESLint + Prettier**: O código é analisado com ESLint e formatado com Prettier; a configuração encontra-se em `eslint.config.mjs` na raiz do projeto. O `prettier-plugin-tailwindcss` também está ativado para a ordenação automática das classes Tailwind.
* **Composition API**: Utilize a sintaxe `<script setup>` do Vue 3 para novos componentes
* **TypeScript**: O TypeScript é suportado; utilize-o para código com segurança de tipos

## CSS

* **Tailwind CSS**: Prefira classes utilitárias em vez de CSS personalizado
* **Nomenclatura BEM**: Quando for necessário CSS personalizado, utilize a convenção de nomenclatura BEM
* **SCSS**: Utilize SCSS para folhas de estilo complexas

## Análise Estática PHP e Ferramentas de Refatoração

O projeto inclui configuração para três ferramentas adicionais:

| Ferramenta | Ficheiro de configuração | Finalidade |
|------|------------|---------|
| **PHPStan** | `phpstan.neon` | Análise estática (nível 5, analisa `src/` e os diretórios de testes) |
| **Psalm** | `psalm.xml` | Segunda passagem de análise estática; executa-se no CI em cada push |
| **Rector** | `rector.php` | Transformações e atualizações automatizadas de código |

Execute-as através dos atalhos do Composer: `composer phpstan`, `composer psalm`. Consulte [Testes](../contributing/testing.md) para os comandos completos.

## Geral

* **Inglês**: Todos os comentários de código, nomes de variáveis e documentação devem estar em inglês
* **Traduções**: Todo o texto visível ao utilizador deve usar o sistema de tradução (Vue I18n no frontend, Symfony Translator no backend)
* **Sem valores mágicos**: Utilize constantes ou enums em vez de valores literais codificados