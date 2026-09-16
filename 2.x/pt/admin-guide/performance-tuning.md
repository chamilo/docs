# Otimização de Desempenho

As configurações de desempenho ajudam a otimizar o Chamilo para carregamentos de página mais rápidos e melhor utilização de recursos, especialmente em plataformas com muitos usuários simultâneos.

> **Referência adicional**: Sua instalação do Chamilo inclui um guia de otimização estendido. Abra `/documentation/optimization.html` em um navegador (por exemplo, `https://seu-site-chamilo/documentation/optimization.html`) para recomendações específicas ao nível do servidor para sua versão.

## Cache do Symfony

O Chamilo 2.0 é construído sobre o Symfony, que utiliza um cache compilado para roteamento, injeção de dependência e templates. Gerenciar esse cache é essencial para o desempenho.

### Limpeza do Cache

Após alterações de configuração, implantação ou atualizações, limpe o cache do Symfony:

```bash
# Limpar cache para o ambiente atual
php bin/console cache:clear

# Especificamente para ambientes de produção
php bin/console cache:clear --env=prod
```

Em produção, certifique-se sempre de que `APP_ENV=prod` está definido no seu arquivo `.env.local`. O ambiente de desenvolvimento (`APP_ENV=dev`) inclui uma sobrecarga significativa de depuração e nunca deve ser usado em produção.

### Aquecimento do Cache

Após limpar o cache, aqueça-o para pré-compilar templates e configurações:

```bash
php bin/console cache:warmup --env=prod
```

## Estratégias de Cache

| Estratégia | Descrição |
|------------|-----------|
| **OPcache** | Cache de opcode integrado ao PHP. Certifique-se de que está habilitado no seu `php.ini` com memória adequada (`opcache.memory_consumption=256`). Esta é a otimização de desempenho mais impactante. |
| **APCu** | Um cache de chave-valor em memória usado pelo Symfony para armazenar metadados. Instale a extensão APCu do PHP e configure-a na configuração de cache do Symfony. |
| **Redis / Memcached** | Para plataformas de alto tráfego, configure um backend de cache externo. Defina o adaptador de cache em `config/packages/cache.yaml`. |

### Configurações Recomendadas para OPcache

```ini
opcache.enable=1
opcache.memory_consumption=256
opcache.max_accelerated_files=20000
opcache.validate_timestamps=0   ; Defina como 0 em produção para melhor desempenho
opcache.revalidate_freq=0
```

Quando `validate_timestamps` está definido como 0, você deve limpar o OPcache após implantar novo código (reiniciar o PHP-FPM ou chamar `opcache_reset()`).

## Carregamento Preguiçoso (Lazy Loading)

| Configuração | Descrição |
|--------------|-----------|
| **Carregamento preguiçoso de imagens** | Habilita o atributo `loading="lazy"` em imagens para que imagens fora da tela sejam carregadas apenas quando roladas para a visualização. Reduz o tempo de carregamento inicial da página. |
| **Carregamento diferido de JavaScript** | Carrega arquivos JavaScript não críticos de forma assíncrona para evitar o bloqueio da renderização da página. |

## CDN (Rede de Distribuição de Conteúdo)

Para plataformas que atendem usuários em várias regiões geográficas, uma CDN pode melhorar significativamente os tempos de carregamento de ativos estáticos (CSS, JavaScript, imagens).

Para configurar uma CDN:

1. Configure uma distribuição CDN (por exemplo, CloudFront, Cloudflare ou outro provedor) apontando para o seu servidor Chamilo.
2. Configure a URL base de ativos no seu ambiente ou na configuração do Symfony para que os ativos estáticos sejam servidos através da CDN.
3. Defina cabeçalhos de cache apropriados para arquivos estáticos (expiração longa para ativos versionados).

## Otimização de Banco de Dados

| Ação | Descrição |
|------|-----------|
| **Usar pool de conexões de banco de dados** | Para plataformas de alta concorrência, configure o pool de conexões para reduzir a sobrecarga de estabelecer conexões com o banco de dados. |
| **Otimizar consultas** | O Chamilo inclui índices de banco de dados para consultas comuns. Execute `ANALYZE TABLE` periodicamente no MySQL/MariaDB para manter as estatísticas do planejador de consultas atualizadas. |
| **Servidor de banco de dados separado** | Para grandes instalações, execute o banco de dados em um servidor dedicado em vez de compartilhar recursos com o servidor web. |

## Configuração do Servidor Web

| Otimização | Descrição |
|------------|-----------|
| **Habilitar compressão gzip/brotli** | Comprima respostas HTML, CSS e JavaScript. A maioria dos servidores web suporta isso nativamente. |
| **Cache de arquivos estáticos** | Defina cabeçalhos longos de `Cache-Control` e `Expires` para ativos estáticos. |
| **Ajuste do PHP-FPM** | Ajuste `pm.max_children`, `pm.start_servers` e `pm.max_requests` com base na RAM disponível e na concorrência esperada. |
| **HTTP/2** | Habilite o HTTP/2 no seu servidor web para conexões multiplexadas e compressão de cabeçalhos. |

## Dicas

* **OPcache é a maior vantagem** -- Certifique-se de que está habilitado e dimensionado corretamente antes de buscar outras otimizações.
* **Nunca execute produção com `APP_ENV=dev`** -- A barra de ferramentas de depuração e o profiler adicionam uma sobrecarga significativa a cada solicitação.
* **Monitore antes de ajustar** -- Use ferramentas como New Relic, Blackfire ou o profiler integrado do Symfony (no modo dev) para identificar gargalos reais em vez de adivinhar.
* **Aqueça o cache após cada implantação** para evitar que o primeiro usuário enfrente uma solicitação lenta sem cache.