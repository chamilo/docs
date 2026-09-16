# Ajuste de Desempenho

As definições de desempenho ajudam a otimizar o Chamilo para carregamentos de página mais rápidos e melhor utilização de recursos, especialmente em plataformas com muitos utilizadores simultâneos.

> **Referência adicional**: A sua instalação do Chamilo inclui um guia de otimização alargado. Abra `/documentation/optimization.html` num browser (p. ex. `https://your-chamilo-site/documentation/optimization.html`) para recomendações ao nível do servidor específicas da sua versão.

## Cache do Symfony

O Chamilo 3.0 é construído sobre o Symfony, que utiliza uma cache compilada para routing, injeção de dependências e templates. Gerir esta cache é essencial para o desempenho.

### Limpar a Cache

Após alterações de configuração, implantação ou atualizações, limpe a cache do Symfony:

```bash
# Clear cache for the current environment
php bin/console cache:clear

# For production environments specifically
php bin/console cache:clear --env=prod
```

Em produção, certifique-se sempre de que `APP_ENV=prod` está definido no ficheiro `.env.local`. O ambiente de desenvolvimento (`APP_ENV=dev`) inclui uma sobrecarga extensa de depuração e nunca deve ser utilizado em produção.

### Pré-aquecimento da Cache

Após limpar a cache, faça o warmup para pré-compilar templates e configuração:

```bash
php bin/console cache:warmup --env=prod
```

## Estratégias de Cache

| Estratégia | Descrição |
|----------|-------------|
| **OPcache** | Cache de opcode integrada do PHP. Certifique-se de que está ativada no seu `php.ini` com memória adequada (`opcache.memory_consumption=256`). Esta é a otimização de desempenho com maior impacto. |
| **APCu** | Cache em memória chave-valor utilizada pelo Symfony para armazenar metadados. Instale a extensão PHP APCu e configure-a na configuração de cache do Symfony. |
| **Redis / Memcached** | Para plataformas de elevado tráfego, configure um backend de cache externo. Defina o adaptador de cache em `config/packages/cache.yaml`. |

### Definições Recomendadas do OPcache

```ini
opcache.enable=1
opcache.memory_consumption=256
opcache.max_accelerated_files=20000
opcache.validate_timestamps=0   ; Set to 0 in production for best performance
opcache.revalidate_freq=0
```

Quando `validate_timestamps` está definido como 0, deve limpar o OPcache após implantar código novo (reinicie o PHP-FPM ou chame `opcache_reset()`).

## Carregamento Preguiçoso

| Definição | Descrição |
|---------|-------------|
| **Lazy-load images** | Ativa o atributo `loading="lazy"` nas imagens para que as imagens fora do ecrã só carreguem quando entram na vista ao fazer scroll. Reduz o tempo de carregamento inicial da página. |
| **Deferred JavaScript loading** | Carrega ficheiros JavaScript não críticos de forma assíncrona para evitar bloquear a renderização da página. |

## CDN (Content Delivery Network)

Para plataformas que servem utilizadores em várias regiões geográficas, uma CDN pode melhorar significativamente os tempos de carregamento de recursos estáticos (CSS, JavaScript, imagens).

Para configurar uma CDN:

1. Configure uma distribuição CDN (p. ex., CloudFront, Cloudflare ou outro fornecedor) apontando para o seu servidor Chamilo.
2. Configure o URL base dos assets no ambiente ou na configuração do Symfony para que os recursos estáticos sejam servidos através da CDN.
3. Defina cabeçalhos de cache adequados para ficheiros estáticos (expiração longa para assets versionados).

## Otimização da Base de Dados

| Ação | Descrição |
|--------|-------------|
| **Use database connection pooling** | Para plataformas de elevada concorrência, configure o pooling de ligações para reduzir a sobrecarga de estabelecer ligações à base de dados. |
| **Optimize queries** | O Chamilo inclui índices de base de dados para consultas comuns. Execute `ANALYZE TABLE` periodicamente no MySQL/MariaDB para manter atualizadas as estatísticas do planeador de consultas. |
| **Separate database server** | Para instalações grandes, execute a base de dados num servidor dedicado em vez de partilhar recursos com o servidor web. |

## Configuração do Servidor Web

| Otimização | Descrição |
|--------------|-------------|
| **Enable gzip/brotli compression** | Comprima respostas HTML, CSS e JavaScript. A maioria dos servidores web suporta isto nativamente. |
| **Static file caching** | Defina cabeçalhos `Cache-Control` e `Expires` longos para recursos estáticos. |
| **PHP-FPM tuning** | Ajuste `pm.max_children`, `pm.start_servers` e `pm.max_requests` com base na RAM disponível e na concorrência esperada. |
| **HTTP/2** | Ative HTTP/2 no servidor web para ligações multiplexadas e compressão de cabeçalhos. |

## Dicas

* **O OPcache é o maior ganho isolado** -- Certifique-se de que está ativado e corretamente dimensionado antes de prosseguir com outras otimizações.
* **Nunca execute produção com `APP_ENV=dev`** -- A barra de depuração e o profiler adicionam sobrecarga significativa a cada pedido.
* **Monitorize antes de ajustar** -- Utilize ferramentas como New Relic, Blackfire ou o profiler integrado do Symfony (em modo de desenvolvimento) para identificar os verdadeiros gargalos em vez de adivinhar.
* **Faça o warmup da cache após cada implantação** para evitar que o primeiro utilizador encontre um pedido lento sem cache.