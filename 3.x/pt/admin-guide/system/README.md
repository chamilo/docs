# Sistema

O bloco **Sistema** no painel de administração agrupa ferramentas de manutenção ao nível do servidor, o fluxo de autoatualização, utilitários de inspeção de armazenamento/recursos e a identidade visual da plataforma.

![O bloco Sistema no painel de administração, listando Limpar ficheiros temporários, Estado do sistema, Atualização do sistema, Cores, Informação de ficheiros, Recursos por tipo e Listar ícones](/.gitbook/assets/admin-system-block.png)

## Aceder ao bloco Sistema

No painel de administração, o bloco **Sistema** aparece juntamente com os outros blocos do painel. Clique em qualquer uma das respetivas ligações para abrir a ferramenta correspondente.

## O que contém o bloco

* **[Ferramentas de sistema](system-tools.md)** — Limpar ficheiros temporários, executar o fluxo de autoatualização, inspecionar ficheiros e recursos armazenados e percorrer o conjunto de ícones integrado
* **Estado do sistema** — Tratado em [Estado do sistema](../maintenance/system-status.md), em Manutenção
* **[Identidade visual](branding/README.md)** — Temas de cores (a ligação «Cores» do bloco abre a mesma página Temas de cores), personalização do portal e modelos

Dois itens adicionais — **Data filler** e **E-mail tester** — só aparecem quando o servidor tem um diretório `tests/` presente, o que corresponde a uma configuração de desenvolvimento/QA, não de produção. Não aparecerão numa instalação de produção típica; consulte [Ferramentas de sistema](system-tools.md#development-only-tools) para saber o que fazem quando estão presentes.