# Ajuste de Desempenho

As configurações de desempenho ajudam a otimizar o Chamilo para carregamentos de página mais rápidos e melhor utilização de recursos, especialmente em plataformas com muitos usuários simultâneos.

> **Referência adicional**: A instalação do Chamilo inclui um guia de otimização estendido. Abra `/documentation/optimization.html` em um navegador (por exemplo, `https://your-chamilo-site/documentation/optimization.html`) para recomendações em nível de servidor específicas da sua versão.

## Cache do Symfony

O Chamilo 3.0 é construído sobre o Symfony, que usa um cache compilado para roteamento, injeção de dependências e templates. Gerenciar esse cache é essencial para o desempenho.

### Limpeza do Cache

Após alterações de configuração, implantação ou atualizações, limpe o cache do Symfony:

```bash
# Clear cache for the current environment
php bin/console cache:clear

# For production environments specifically
php bin/console cache:clear --env=prod
```

Em produção, sempre certifique-se de que `APP_ENV=prod` esteja definido no arquivo `.env.local`. O ambiente de desenvolvimento (`APP_ENV=dev`) inclui sobrecarga extensa de depuração e nunca deve ser usado em produção.

### Pré-aquecimento do Cache

Após limpar o cache, faça o warmup para pré-compilar templates e configuração:

```bash
php bin/console cache:warmup --env=prod
```

## Estratégias de Cache

| Estratégia | Descrição |
|----------|-------------|
| **OPcache** | Cache de opcode nativo do PHP. Certifique-se de que esteja habilitado no seu `php.ini` com memória adequada (`opcache.memory_consumption=256`). Esta é a otimização de desempenho de maior impacto isolado. |
| **APCu** | Cache chave-valor em memória usado pelo Symfony para armazenar metadados. Instale a extensão PHP APCu e configure-a na configuração de cache do Symfony. |
| **Redis / Memcached** | Para plataformas de alto tráfego, configure um backend de cache externo. Defina o adaptador de cache em `config/packages/cache.yaml`. |

### Configurações Recomendadas do OPcache

```ini
opcache.enable=1
opcache.memory_consumption=256
opcache.max_accelerated_files=20000
opcache.validate_timestamps=0   ; Set to 0 in production for best performance
opcache.revalidate_freq=0
```

Quando `validate_timestamps` estiver definido como 0, você deve limpar o OPcache após implantar código novo (reinicie o PHP-FPM ou chame `opcache_reset()`).

## Carregamento Preguiçoso

| Configuração | Descrição |
|---------|-------------|
| **Lazy-load images** | Habilita o atributo `loading="lazy"` nas imagens para que imagens fora da tela sejam carregadas somente quando roladas para a área visível. Reduz o tempo de carregamento inicial da página. |
| **Deferred JavaScript loading** | Carrega arquivos JavaScript não críticos de forma assíncrona para evitar o bloqueio da renderização da página. |

## CDN (Content Delivery Network)

Para plataformas que atendem usuários em várias regiões geográficas, uma CDN pode melhorar significativamente os tempos de carregamento de ativos estáticos (CSS, JavaScript, imagens).

Para configurar uma CDN:

1. Configure uma distribuição CDN (por exemplo, CloudFront, Cloudflare ou outro provedor) apontando para o servidor Chamilo.
2. Configure a URL base dos ativos no ambiente ou na configuração do Symfony para que os ativos estáticos sejam servidos pela CDN.
3. Defina cabeçalhos de cache apropriados para arquivos estáticos (expiração longa para ativos versionados).

## Otimização do Banco de Dados

| Ação | Descrição |
|--------|-------------|
| **Use database connection pooling** | Para plataformas de alta concorrência, configure o pooling de conexões para reduzir a sobrecarga de estabelecer conexões com o banco de dados. |
| **Optimize queries** | O Chamilo inclui índices de banco de dados para consultas comuns. Execute `ANALYZE TABLE` periodicamente no MySQL/MariaDB para manter atualizadas as estatísticas do planejador de consultas. |
| **Separate database server** | Em instalações grandes, execute o banco de dados em um servidor dedicado em vez de compartilhar recursos com o servidor web. |

## Configuração do Servidor Web

| Otimização | Descrição |
|--------------|-------------|
| **Enable gzip/brotli compression** | Compacte respostas HTML, CSS e JavaScript. A maioria dos servidores web oferece suporte nativo a isso. |
| **Static file caching** | Defina cabeçalhos `Cache-Control` e `Expires` longos para ativos estáticos. |
| **PHP-FPM tuning** | Ajuste `pm.max_children`, `pm.start_servers` e `pm.max_requests` com base na RAM disponível e na concorrência esperada. |
| **HTTP/2** | Habilite HTTP/2 no servidor web para conexões multiplexadas e compressão de cabeçalhos. |

## Dicas

* **OPcache is the single biggest win** -- Certifique-se de que esteja habilitado e dimensionado corretamente antes de buscar outras otimizações.
* **Never run production with `APP_ENV=dev`** -- A barra de depuração e o profiler adicionam sobrecarga significativa a cada requisição.
* **Monitor before tuning** -- Use ferramentas como New Relic, Blackfire ou o profiler nativo do Symfony (no modo de desenvolvimento) para identificar gargalos reais em vez de adivinhar.
* **Warm the cache after every deployment** para evitar que o primeiro usuário encontre uma requisição lenta sem cache.