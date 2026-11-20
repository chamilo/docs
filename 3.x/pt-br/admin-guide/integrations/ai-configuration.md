# Configuração de IA

O Chamilo 3.0 inclui recursos com inteligência artificial que exigem configuração antes de ficarem disponíveis para professores e alunos.

## Provedores de IA suportados

O Chamilo oferece suporte a vários provedores de IA:

| Provedor | Capacidades |
|----------|-------------|
| **DeepSeek** | Geração de texto |
| **Google Gemini** | Geração de texto, imagem e vídeo |
| **Grok** | Geração de texto, imagem e vídeo |
| **Mistral** | Geração de texto |
| **OpenAI** | Geração de texto, imagem e vídeo |

Cada provedor pode ser configurado para diferentes tipos de tarefas de IA:

* **Texto** — Usado para geração de exercícios, geração de percursos de aprendizagem, correção por IA e o tutor de IA
* **Imagem** — Usado para geração de imagens por IA
* **Vídeo** — Usado para geração de vídeos por IA (quando suportado)
* **Documento** — Usado para análise de documentos por IA

## Etapas de configuração

### 1. Obter chaves de API

Registre-se em uma conta no provedor de IA escolhido e obtenha uma chave de API:

* **DeepSeek**: [platform.deepseek.com](https://platform.deepseek.com/)
* **Google Gemini**: Google AI Studio ou Google Cloud
* **Grok**: [console.x.ai](https://console.x.ai/)
* **Mistral**: [console.mistral.ai](https://console.mistral.ai/)
* **OpenAI**: [platform.openai.com](https://platform.openai.com/)

### 2. Configurar provedores no Chamilo

![A página de configuração dos auxiliares de IA mostrando as definições do provedor com os campos de chave de API, modelo e endpoint](/.gitbook/assets/admin-ai-helpers-config.png)

Nas configurações da plataforma, navegue até a seção **Auxiliares de IA**:

1. **Ativar auxiliares de IA** — Ative os recursos de IA globalmente
2. **Configurar provedores de IA** — Adicione um ou mais provedores com:
   * **Nome do provedor** (deepseek, gemini, grok, mistral, openai)
   * **Chave de API** — Sua chave de API do provedor
   * **Modelo** — O modelo específico a ser usado (por exemplo, `gpt-4`, `gemini-pro`, `mistral-large`)
   * **URL da API** — A URL do endpoint (pré-configurada para provedores padrão)

Você pode configurar vários provedores. O primeiro provedor na configuração torna-se o padrão.

### 3. Ativar recursos por curso

Os recursos de IA podem ser ativados ou desativados no nível do curso. Os professores podem alternar:

* **Chatbot do tutor de IA** — O assistente de IA para os alunos
* **Avaliador de tarefas** — Recomendação de nota gerada por IA
* **Gerador de exercícios** — Questões de questionário geradas por IA
* **Gerador de percurso de aprendizagem** — Sequências de aprendizagem geradas por IA
* **Gerador de imagem/vídeo** — Imagens e vídeos gerados por IA em documentos

Isso permite que cursos diferentes usem configurações de IA distintas conforme suas necessidades.

## Considerações de custo

As chamadas de API de IA têm custos associados. Considere:

* **Definir limites de uso** — Monitore e limite o uso da API de IA para controlar os custos
* **Escolher modelos com critério** — Modelos menores e menos dispendiosos podem ser suficientes para muitas tarefas educacionais
* **Acompanhar o uso** — O Chamilo registra as solicitações de IA para ajudar você a monitorar o consumo

## Dicas

* **Comece com um provedor** — Configure e teste um provedor antes de adicionar outros
* **Teste com um curso** — Ative os recursos de IA primeiro em um curso de teste para verificar se funcionam conforme o esperado
* **Comunique-se com os professores** — Informe os professores quais recursos de IA estão disponíveis e como usá-los
* **Monitore a qualidade** — Revise regularmente o conteúdo gerado por IA para garantir que atenda aos seus padrões educacionais