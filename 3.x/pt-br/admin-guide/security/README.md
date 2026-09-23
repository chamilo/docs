# Segurança

O bloco **Segurança** no painel de administração agrupa as ferramentas internas de monitoramento de segurança e auditoria da plataforma. Ele é distinto das [Configurações de Segurança](../platform-settings/security-settings.md), que configuram a *política* de segurança (regras de senha, CAPTCHA, cabeçalhos de segurança HTTP e assim por diante) — este bloco oferece os *relatórios e ferramentas* que observam a plataforma em busca de atividade suspeita e alterações indesejadas.

![O bloco Segurança no painel de administração, listando Auditoria de atividades, Tentativas de login, Simple IDS, Verificador de força de senha e Integridade de arquivos](../../.gitbook/assets/admin-security-block.png)

O bloco foi introduzido no Chamilo 2.0 com quatro ferramentas e ampliado no Chamilo 3.0 com uma quinta, **Integridade de arquivos**.

## Acessando o Bloco Segurança

No painel de administração, o bloco **Segurança** aparece ao lado dos demais blocos do painel (Usuários, Cursos, Gestão da plataforma, Sistema e assim por diante). Clique em qualquer um de seus links para abrir a ferramenta correspondente.

## O que há no bloco

* **[Auditoria de Atividades](activities-audit.md)** — Percorra eventos administrativos e da plataforma importantes (alterações de usuário, curso, sessão e outras) por tipo de evento
* **[Tentativas de Login](login-attempts.md)** — Revise tentativas de login com falha e com sucesso, com gráficos e um registro pesquisável
* **[Simple IDS](simple-ids.md)** — Veja requisições sinalizadas pelo sistema de detecção de intrusão interno e leve do Chamilo
* **[Verificador de Força de Senha](password-strength-checker.md)** — Analise usuários ativos em busca de senhas que coincidam com uma lista de senhas comumente usadas
* **[Integridade de Arquivos](file-integrity.md)** *(novo no Chamilo 3.0)* — Detecte adições, modificações, exclusões ou alterações de permissão inesperadas nos arquivos instalados

## Quem pode acessá-lo

Todas as cinco ferramentas exigem acesso de **Administrador do Portal**. As ações de varredura, pausa e redefinição da linha de base da Integridade de arquivos exigem adicionalmente acesso de **Administrador Global**, e pausar alertas ou estabelecer uma nova linha de base exige que você informe novamente a própria senha — consulte [Integridade de Arquivos](file-integrity.md#actions) para detalhes.