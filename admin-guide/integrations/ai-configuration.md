# Configuração de IA

O Chamilo 2.0 inclui funcionalidades alimentadas por IA que requerem configuração antes de ficarem disponíveis para professores e alunos.

## Provedores de IA Suportados

O Chamilo suporta múltiplos provedores de IA:

| Provedor | Capacidades |
|----------|-------------|
| **DeepSeek** | Geração de texto |
| **Google Gemini** | Geração de texto, imagem e vídeo |
| **Grok** | Geração de texto, imagem e vídeo |
| **Mistral** | Geração de texto |
| **OpenAI** | Geração de texto, imagem e vídeo |

Cada provedor pode ser configurado para diferentes tipos de tarefas de IA:

* **Texto** — Usado para geração de exercícios, geração de caminhos de aprendizagem, avaliação por IA e o tutor de IA
* **Imagem** — Usado para geração de imagens por IA
* **Vídeo** — Usado para geração de vídeos por IA (onde suportado)
* **Documento** — Usado para análise de documentos por IA

## Passos de Configuração

### 1. Obter Chaves de API

Registre-se para uma conta com o provedor de IA escolhido e obtenha uma chave de API:

* **DeepSeek**: [platform.deepseek.com](https://platform.deepseek.com/)
* **Google Gemini**: Google AI Studio ou Google Cloud
* **Grok**: [console.x.ai](https://console.x.ai/)
* **Mistral**: [console.mistral.ai](https://console.mistral.ai/)
* **OpenAI**: [platform.openai.com](https://platform.openai.com/)

### 2. Configurar Provedores no Chamilo

![A página de configuração dos assistentes de IA mostrando as configurações do provedor com campos para chave de API, modelo e endpoint](/.gitbook/assets/admin-ai-helpers-config.png)

Nas configurações da plataforma, navegue até a seção **Assistentes de IA**:

1. **Ativar assistentes de IA** — Ligue as funcionalidades de IA globalmente
2. **Configurar provedores de IA** — Adicione um ou mais provedores com:
   * **Nome do provedor** (deepseek, gemini, grok, mistral, openai)
   * **Chave de API** — Sua chave de API para o provedor
   * **Modelo** — O modelo específico a ser usado (por exemplo, `gpt-4`, `gemini-pro`, `mistral-large`)
   * **URL da API** — A URL do endpoint (pré-configurada para provedores padrão)

Você pode configurar múltiplos provedores. O primeiro provedor na configuração torna-se o padrão.

### 3. Ativar Funcionalidades por Curso

As funcionalidades de IA podem ser ativadas ou desativadas no nível do curso. Os professores podem alternar:

* **Chatbot Tutor de IA** — O assistente de IA para os alunos
* **Avaliador de tarefas** — Recomendação de avaliação gerada por IA
* **Gerador de exercícios** — Questões de quiz geradas por IA
* **Gerador de caminho de aprendizagem** — Sequências de aprendizagem geradas por IA
* **Gerador de imagem/vídeo** — Imagens e vídeos gerados por IA em documentos

Isso permite que diferentes cursos utilizem configurações de IA distintas com base em suas necessidades.

## Considerações sobre Custos

As chamadas de API de IA têm custos associados. Considere:

* **Definir limites de uso** — Monitore e limite o uso da API de IA para controlar custos
* **Escolher modelos com sabedoria** — Modelos menores e menos caros podem ser suficientes para muitas tarefas educacionais
* **Rastrear uso** — O Chamilo registra as solicitações de IA para ajudar a monitorar o consumo

## Dicas

* **Comece com um provedor** — Configure e teste um provedor antes de adicionar mais
* **Teste com um curso** — Ative as funcionalidades de IA em um curso de teste primeiro para verificar se funcionam conforme esperado
* **Comunique-se com os professores** — Informe os professores sobre quais funcionalidades de IA estão disponíveis e como usá-las
* **Monitore a qualidade** — Revise regularmente o conteúdo gerado por IA para garantir que atenda aos seus padrões educacionais