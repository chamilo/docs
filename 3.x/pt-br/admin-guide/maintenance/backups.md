# Backups

Backups regulares são essenciais para proteger os dados do Chamilo. Esta página aborda o que fazer backup e como.

## What to Back Up

### 1. Database

O banco de dados do Chamilo contém todos os dados da plataforma: usuários, cursos, rastreamento, notas, mensagens e configurações. Este é o componente mais crítico a ser copiado.

**How to back up:**

```bash
mysqldump -u username -p chamilo_database > chamilo_backup_$(date +%Y%m%d).sql
```

### 2. Files

O Chamilo armazena arquivos enviados (documentos, imagens, pacotes SCORM) no sistema de arquivos. Os diretórios principais a serem copiados:

* `var/` — Arquivos e recursos enviados
* `public/plugin/` — Arquivos de plugins (somente se você tiver adicionado plugins personalizados)

Se você usar armazenamento em nuvem (S3, Azure Blob), certifique-se de que o backup/versionamento do provedor de nuvem esteja habilitado.

### 3. Configuration

* `.env` — Sua configuração de ambiente
* `config/` — Quaisquer arquivos de configuração personalizados

## Backup Schedule

| Component | Recommended frequency |
|-----------|---------------------|
| Database | Daily |
| Files | Daily or weekly (depending on upload activity) |
| Configuration | After any configuration change |

## Restoration

Para restaurar a partir de um backup:

1. Restaure o banco de dados a partir do dump SQL
2. Restaure os diretórios de arquivos
3. Restaure os arquivos de configuração
4. Limpe o cache do Symfony: `php bin/console cache:clear`

## Tips

* **Automate backups** — Use tarefas cron para executar backups automaticamente
* **Store off-site** — Mantenha cópias de backup em um servidor separado ou no armazenamento em nuvem
* **Test restoration** — Teste periodicamente se você consegue restaurar a partir de um backup com sucesso
* **Document your process** — Mantenha instruções escritas para o processo de restauração para que qualquer pessoa da equipe possa executá-lo