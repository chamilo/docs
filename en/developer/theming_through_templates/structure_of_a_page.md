## Structure of a page {#structure-of-a-page}

The structure of a typical page will thus be something close to the following. We are using a shortened version of main/template/default/layout/layout_2_col.tpl here, for the sake of documentation. layout_2_col means « layout for 2 colums page », and it is selected when we want to show things like the courses list.

All text marked as `{# ...text here... #}` (colored gray in the following example} is a comment that serves only the developers and designers. It will not appear in the final HTML generated. If you want an HTML comment, simply use its normal syntax &lt; !-- HTML comment →.

All text marked as `{ % ...text here... %}` (colored green) is specific Twig statements-language and marks some special action (more on that later). This can include « if » conditions and stuff like that.

All normal HTML tag will appear as is. No need for any trick.

All text marked `{{ ...text here... }}` (colored blue) is an insert of a specific template variable prepared by your PHP scripts. This is how you call those variables which you have carefully prepared for display. These are usually strings or arrays (array values are called through the _array.index_ syntax).

```
{% if content is not null %}

{{ content }}

{% endif %}

{% endblock %}

```

As you can see in the example, some « include » statements can be found. They get the indicated file and put its content right where you placed the call. This is practical to re-use other already-templated blocks.