# Convenções de Codificação

## PHP

* **Padrão**: Estilo de codificação PSR-12
* **Declarações de tipo**: Utilize declarações de tipo do PHP 8.2 (tipos de parâmetros, tipos de retorno, tipos de propriedades)
* **Tipos estritos**: Todos os arquivos PHP devem declarar `strict_types=1`
* **Namespaces**: Siga o autoloading PSR-4 (por exemplo, `Chamilo\CoreBundle\Entity\User`)
* **Padrões do Symfony**: Siga os padrões de codificação e melhores práticas do Symfony

## JavaScript/Vue

* **ESLint + Prettier**: O código é verificado com ESLint e formatado com Prettier; a configuração está em `eslint.config.mjs` na raiz do projeto. O plugin `prettier-plugin-tailwindcss` também está habilitado para ordenação automática de classes Tailwind.
* **Composition API**: Use a sintaxe `<script setup>` do Vue 3 para novos componentes
* **TypeScript**: TypeScript é suportado; utilize-o para código com segurança de tipo

## CSS

* **Tailwind CSS**: Prefira classes utilitárias em vez de CSS personalizado
* **Nomenclatura BEM**: Quando CSS personalizado for necessário, use a convenção de nomenclatura BEM
* **SCSS**: Use SCSS para folhas de estilo complexas

## Ferramentas de Análise Estática e Refatoração de PHP

O projeto inclui configurações para três ferramentas adicionais:

| Ferramenta | Arquivo de Configuração | Finalidade |
|------------|-------------------------|------------|
| **PHPStan** | `phpstan.neon` | Análise estática (nível 5, escaneia diretórios `src/` e de testes) |
| **Psalm** | `psalm.xml` | Segunda passagem de análise estática; executado no CI a cada push |
| **Rector** | `rector.php` | Transformações e atualizações de código automatizadas |

Execute-as por meio de atalhos do Composer: `composer phpstan`, `composer psalm`. Veja [Testes](../contributing/testing.md) para comandos completos.

## Geral

* **Inglês**: Todos os comentários de código, nomes de variáveis e documentação devem estar em inglês
* **Traduções**: Todo texto voltado para o usuário deve usar o sistema de tradução (Vue I18n para o frontend, Symfony Translator para o backend)
* **Sem valores mágicos**: Use constantes ou enums em vez de valores codificados diretamente