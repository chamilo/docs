# Structuur van een pagina

The structure of a typical page will thus be something close to the following. We are using a shortened version of `main/template/default/layout/layout_2_col.tpl` here, for the sake of documentation. `layout_2_col` means « layout for 2 colums page », and it is selected when we want to show things like the courses list, because on this screen we have two columns: the side menu and the list of courses.

All normal HTML tag will appear as is. No need for any trick.

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

As you can see in the example, some « include » statements can be found. They get the indicated file and put its content right where you placed the call. This is practical to re-use other already-templated blocks.

