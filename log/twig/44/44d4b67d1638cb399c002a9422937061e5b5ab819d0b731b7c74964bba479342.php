<?php

/* layouts.html */
class __TwigTemplate_383dfffdba63e0c672ecadc39a0525f0bf7898e037cc0b8a3b0622ecb5793209 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'content' => array($this, 'block_content'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!DOCTYPE html>
<html lang=\"en\">
<head>
\t<meta charset=\"UTF-8\">
\t<title></title>
</head>
<body>
\t<header>header</header>
\t<content>
\t";
        // line 10
        $this->displayBlock('content', $context, $blocks);
        // line 12
        echo "\t</content>
\t<footer>footer</footer>
</body>
</html>";
    }

    // line 10
    public function block_content($context, array $blocks = array())
    {
        // line 11
        echo "\t";
    }

    public function getTemplateName()
    {
        return "layouts.html";
    }

    public function getDebugInfo()
    {
        return array (  43 => 11,  40 => 10,  33 => 12,  31 => 10,  20 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("<!DOCTYPE html>
<html lang=\"en\">
<head>
\t<meta charset=\"UTF-8\">
\t<title></title>
</head>
<body>
\t<header>header</header>
\t<content>
\t{% block content %}
\t{% endblock  %}
\t</content>
\t<footer>footer</footer>
</body>
</html>", "layouts.html", "D:\\mvc\\app\\views\\layouts.html");
    }
}
