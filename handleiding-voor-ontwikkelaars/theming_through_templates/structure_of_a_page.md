# Structuur van een pagina

De structuur van een typische pagina zal dus iets zijn dat in de buurt komt van het volgende. We gebruiken hier een verkorte versie van `main/template/default/layout/layout_2_col.tpl`, ter wille van de documentatie. `layout_2_col` betekent« layout voor pagina met 2 kolommen », en het wordt geselecteerd als we dingen zoals de cursuslijst willen tonen, omdat we op dit scherm twee kolommen hebben: het zijmenu en de lijst met cursussen.

Alle normale HTML-tags worden weergegeven zoals ze zijn. Geen enkele truc nodig.

```text
{% extends template ~ "/layout/main.tpl" %} 
{% block body %} 
    {# Main content #} 
    {#  Right column  #} 
    <div class="span3 menu-column"> 
        {# if user is not login show the login form #} 
            {% if _u.logged  == 0 %} 
                {% include template ~ "/layout/login_form.tpl" %} 
            {% endif %} 
        {#  User picture  #} 
        {{ user_image_block }} 
        {{#  User Profile links #} 
        {{ profile_block }} 
    </div> 
    <div class="span9 content-column"> 
        {#  Portal homepage  #} 
        {% if home_page_block %} 
        <section id="homepage"> 
            <div class="row"> 
                <div class="span9"> 
                    {{ home_page_block }} 
                </div>
            </div>
        </section>
        {% endif %}
        {% include template ~ "/layout/page_body.tpl" %} 
        {% if content is not null %} 
        <section id="main_content"> 
            {{ content }}
        </section> 
        {% endif %}
    </div>
{% endblock %}
```

Zoals u in het voorbeeld kunt zien, zijn enkele «include» -verklaringen te vinden. Ze krijgen het aangegeven bestand en plaatsen de inhoud precies daar waar u de oproep heeft geplaatst. Dit is praktisch om andere blokken die al een sjabloon hebben, opnieuw te gebruiken.

