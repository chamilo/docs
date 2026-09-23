# Configuração de IA

O Chamilo 3.0 inclui funcionalidades com inteligência artificial que exigem configuração antes de ficarem disponíveis para professores e alunos.

## Fornecedores de IA suportados

O Chamilo suporta vários fornecedores de IA:

| Fornecedor | Capacidades |
|----------|-------------|
| **DeepSeek** | Geração de texto |
| **Google Gemini** | Geração de texto, imagem e vídeo |
| **Grok** | Geração de texto, imagem e vídeo |
| **Mistral** | Geração de texto |
| **OpenAI** | Geração de texto, imagem e vídeo |

Cada fornecedor pode ser configurado para diferentes tipos de tarefas de IA:

* **Texto** — Utilizado para geração de exercícios, geração de percursos de aprendizagem, classificação por IA e o tutor de IA
* **Imagem** — Utilizado para geração de imagens por IA
* **Vídeo** — Utilizado para geração de vídeo por IA (quando suportado)
* **Documento** — Utilizado para análise de documentos por IA

## Passos de configuração

### 1. Obter chaves de API

Registe uma conta no fornecedor de IA escolhido e obtenha uma chave de API:

* **DeepSeek**: [platform.deepseek.com](https://platform.deepseek.com/)
* **Google Gemini**: Google AI Studio ou Google Cloud
* **Grok**: [console.x.ai](https://console.x.ai/)
* **Mistral**: [console.mistral.ai](https://console.mistral.ai/)
* **OpenAI**: [platform.openai.com](https://platform.openai.com/)

### 2. Configurar fornecedores no Chamilo

![A página de configuração dos assistentes de IA a mostrar as definições do fornecedor com os campos de chave de API, modelo e endpoint](../../.gitbook/assets/admin-ai-helpers-config.png)

Nas definições da plataforma, navegue até à secção **AI Helpers**:

1. **Ativar assistentes de IA** — Ative as funcionalidades de IA a nível global
2. **Configurar fornecedores de IA** — Adicione um ou mais fornecedores com:
   * **Nome do fornecedor** (deepseek, gemini, grok, mistral, openai)
   * **Chave de API** — A sua chave de API para o fornecedor
   * **Modelo** — O modelo específico a utilizar (por exemplo, `gpt-4`, `gemini-pro`, `mistral-large`)
   * **URL da API** — O URL do endpoint (pré-configurado para os fornecedores padrão)

Pode configurar vários fornecedores. O primeiro fornecedor na configuração torna-se o predefinido.

### 3. Ativar funcionalidades por curso

As funcionalidades de IA podem ser ativadas ou desativadas ao nível do curso. Os professores podem ativar ou desativar:

* **Chatbot do tutor de IA** — O assistente de IA para os alunos
* **Avaliador de trabalhos** — Recomendação de classificação gerada por IA
* **Gerador de exercícios** — Perguntas de teste geradas por IA
* **Gerador de percursos de aprendizagem** — Sequências de aprendizagem geradas por IA
* **Gerador de imagem/vídeo** — Imagens e vídeos gerados por IA em documentos

Isto permite que cursos diferentes utilizem configurações de IA distintas consoante as suas necessidades.

## Considerações de custo

As chamadas à API de IA têm custos associados. Considere:

* **Definir limites de utilização** — Monitorize e limite a utilização da API de IA para controlar os custos
* **Escolher os modelos com critério** — Modelos mais pequenos e menos dispendiosos podem ser suficientes para muitas tarefas educativas
* **Acompanhar a utilização** — O Chamilo regista os pedidos de IA para o ajudar a monitorizar o consumo

## Sugestões

* **Comece com um fornecedor** — Configure e teste um fornecedor antes de adicionar mais
* **Teste com um curso** — Ative as funcionalidades de IA primeiro num curso de teste para verificar se funcionam como esperado
* **Comunique com os professores** — Informe os professores sobre quais as funcionalidades de IA disponíveis e como as utilizar
* **Monitorize a qualidade** — Reveja regularmente o conteúdo gerado por IA para garantir que cumpre os seus padrões educativos