# Cópias de segurança

As cópias de segurança regulares são essenciais para proteger os dados do Chamilo. Esta página descreve o que deve ser salvaguardado e como.

## O que salvaguardar

### 1. Base de dados

A base de dados do Chamilo contém todos os dados da plataforma: utilizadores, cursos, acompanhamento, classificações, mensagens e definições. Este é o componente mais crítico a salvaguardar.

**Como efetuar a cópia de segurança:**

```bash
mysqldump -u username -p chamilo_database > chamilo_backup_$(date +%Y%m%d).sql
```

### 2. Ficheiros

O Chamilo armazena os ficheiros carregados (documentos, imagens, pacotes SCORM) no sistema de ficheiros. Os diretórios principais a salvaguardar:

* `var/` — Ficheiros e recursos carregados
* `public/plugin/` — Ficheiros de plugins (apenas se tiver adicionado plugins personalizados)

Se utilizar armazenamento na nuvem (S3, Azure Blob), certifique-se de que a cópia de segurança/versionamento do fornecedor de nuvem está ativado.

### 3. Configuração

* `.env` — A sua configuração de ambiente
* `config/` — Quaisquer ficheiros de configuração personalizados

## Calendário de cópias de segurança

| Componente | Frequência recomendada |
|-----------|---------------------|
| Base de dados | Diária |
| Ficheiros | Diária ou semanal (consoante a atividade de carregamento) |
| Configuração | Após qualquer alteração de configuração |

## Restauro

Para restaurar a partir de uma cópia de segurança:

1. Restaure a base de dados a partir do dump SQL
2. Restaure os diretórios de ficheiros
3. Restaure os ficheiros de configuração
4. Limpe a cache do Symfony: `php bin/console cache:clear`

## Sugestões

* **Automatize as cópias de segurança** — Utilize tarefas cron para executar as cópias de segurança automaticamente
* **Armazene fora do local** — Mantenha cópias de segurança num servidor separado ou em armazenamento na nuvem
* **Teste o restauro** — Teste periodicamente se consegue restaurar a partir de uma cópia de segurança com êxito
* **Documente o processo** — Mantenha instruções escritas para o processo de restauro, para que qualquer membro da equipa o possa executar