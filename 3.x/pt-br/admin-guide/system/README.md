# Sistema

O bloco **Sistema** no painel de administração agrupa ferramentas de manutenção em nível de servidor, o fluxo de autoatualização, utilitários de inspeção de armazenamento/recursos e a identidade visual da plataforma.

![O bloco Sistema no painel de administração, listando Limpar arquivos temporários, Status do sistema, Atualização do sistema, Cores, Informações de arquivos, Recursos por tipo e Listar ícones](../../.gitbook/assets/admin-system-block.png)

## Acessando o Bloco Sistema

No painel de administração, o bloco **Sistema** aparece ao lado dos demais blocos do painel. Clique em qualquer um de seus links para abrir a ferramenta correspondente.

## O que há no Bloco

* **[Ferramentas do Sistema](system-tools.md)** — Limpar arquivos temporários, executar o fluxo de autoatualização, inspecionar arquivos e recursos armazenados e navegar pelo conjunto de ícones integrado
* **Status do sistema** — Tratado em [Status do Sistema](../maintenance/system-status.md), em Manutenção
* **[Identidade visual](branding/README.md)** — Temas de cores (o link "Cores" do bloco abre a mesma página de Temas de Cores), personalização do portal e modelos

Dois itens adicionais — **Data filler** e **E-mail tester** — só aparecem quando o servidor possui um diretório `tests/` presente, o que é uma configuração de desenvolvimento/QA, não de produção. Eles não aparecerão em uma instalação de produção típica; consulte [Ferramentas do Sistema](system-tools.md#development-only-tools) para saber o que fazem quando presentes.