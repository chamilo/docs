# Backups

Backups regulares são essenciais para proteger os dados do Chamilo. Esta página aborda o que fazer backup e como realizá-lo.

## O que fazer backup

### 1. Banco de dados

O banco de dados do Chamilo contém todos os dados da plataforma: usuários, cursos, rastreamento, notas, mensagens e configurações. Este é o componente mais crítico para fazer backup.

**Como fazer backup:**

```bash
mysqldump -u username -p chamilo_database > chamilo_backup_$(date +%Y%m%d).sql
```

### 2. Arquivos

O Chamilo armazena arquivos enviados (documentos, imagens, pacotes SCORM) no sistema de arquivos. Os diretórios principais para fazer backup são:

* `var/` — Arquivos e recursos enviados
* `public/plugin/` — Arquivos de plugins (somente se você adicionou plugins personalizados)

Se você utiliza armazenamento em nuvem (S3, Azure Blob), certifique-se de que o backup/versão do seu provedor de nuvem está ativado.

### 3. Configuração

* `.env` — Sua configuração de ambiente
* `config/` — Quaisquer arquivos de configuração personalizados

## Cronograma de Backup

| Componente | Frequência recomendada |
|------------|------------------------|
| Banco de dados | Diário |
| Arquivos | Diário ou semanal (dependendo da atividade de upload) |
| Configuração | Após qualquer alteração de configuração |

## Restauração

Para restaurar a partir de um backup:

1. Restaure o banco de dados a partir do dump SQL
2. Restaure os diretórios de arquivos
3. Restaure os arquivos de configuração
4. Limpe o cache do Symfony: `php bin/console cache:clear`

## Dicas

* **Automatize backups** — Use tarefas cron para executar backups automaticamente
* **Armazene fora do local** — Mantenha cópias de backup em um servidor separado ou armazenamento em nuvem
* **Teste a restauração** — Teste periodicamente se você consegue restaurar a partir de um backup com sucesso
* **Documente o processo** — Mantenha instruções escritas para o processo de restauração, para que qualquer pessoa da equipe possa realizá-lo