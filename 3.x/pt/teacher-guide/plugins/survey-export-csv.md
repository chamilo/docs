# Exportação de Inquérito em CSV

Survey Export CSV <img src="/.gitbook/assets/icons/mdi-file-delimited-outline.svg" alt="Exportação de Inquérito em CSV" data-size="line"> adiciona uma exportação com um clique dos resultados de um inquérito para um ficheiro CSV compacto, com uma linha por respondente e uma coluna por pergunta.

## Exportar um Inquérito

Uma vez ativado, a lista da ferramenta **Inquérito** do seu curso passa a ter uma coluna **Exportar** com um ícone CSV em cada linha de inquérito. Clique nele para descarregar os resultados imediatamente — sem passos adicionais.

## O que Contém o Ficheiro

* Os inquéritos anónimos são exportados sem colunas de identidade
* Os inquéritos não anónimos incluem a identidade do respondente juntamente com as respetivas respostas
* A inclusão de respostas incompletas (não concluídas) é controlada pelo administrador, e não por este botão de exportação

## Sugestões

* **Inquéritos grandes podem demorar um momento** — Conjuntos de respostas muito grandes podem ser mais lentos a exportar; trata-se de uma questão de desempenho da base de dados que o administrador pode afinar, se necessário
* **Combine com Survey Export TXT** — Se também tiver o plugin [Survey Export TXT](survey-export-txt.md) ativado, verá dois ícones de exportação; escolha o formato que melhor se adequar à forma como pretende utilizar os dados