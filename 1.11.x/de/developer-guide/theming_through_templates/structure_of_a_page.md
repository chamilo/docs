# Aufbau einer Seite

Die Struktur einer typischen Seite wird daher dem Folgenden nahe kommen. Wir verwenden hier eine verkürzte Version von `main/template/default/layout/layout_2_col.tpl`, um der Dokumentation willen. `layout_2_col` bedeutet « layout for 2 colums page » und wird ausgewählt, wenn wir Dinge wie die Kursliste anzeigen möchten, da wir auf diesem Bildschirm zwei Spalten haben: das Seitenmenü und die Liste der Kurse.

Alle normalen HTML-Tags werden so angezeigt, wie es ist. Keine Notwendigkeit für einen Trick.

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

Wie Sie im Beispiel sehen können, können einige « include » -Anweisungen gefunden werden. Sie erhalten die angegebene Datei und legen den Inhalt genau dort ab, wo Sie den Anruf abgegeben haben. Dies ist praktisch, um andere bereits mehrlagerte Blöcke wiederzuverwenden.