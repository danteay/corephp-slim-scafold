<?php

/* layouts/errors.twig */
class __TwigTemplate_0e3c4e5d158bed87c480bc7e45960ab68c524baf41a9adca469c77f985df1df9 extends Twig_Template
{
    private $source;

    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'errorCode' => array($this, 'block_errorCode'),
            'titleError' => array($this, 'block_titleError'),
            'message' => array($this, 'block_message'),
            'trace' => array($this, 'block_trace'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!DOCTYPE html>
<html lang=\"en\">

    <head>
        <title>";
        // line 5
        $this->displayBlock('title', $context, $blocks);
        echo "</title>

        <meta charset=\"utf-8\">
        <meta name=\"viewport\" content=\"width=device-width, initial-scale=1, shrink-to-fit=no\">
        <meta content=\"authenticity_token\" name=\"csrf-param\" />
        <meta content=\"9ZSEP6FV3F5Ng9v8ofy119IKpYeLd/hswPSl1SXnrm0=\" name=\"csrf-token\" />
        <meta name=\"google-site-verification\" content=\"xw78CPbqZGCZNgprZaDD2NHE4KOdOk17W1I1qhHxIe8\" />

        <link rel=\"stylesheet\" href=\"https://cdn.jsdelivr.net/npm/foundation-sites@6.4.3/dist/css/foundation.min.css\" integrity=\"sha256-GSio8qamaXapM8Fq9JYdGNTvk/dgs+cMLgPeevOYEx0= sha384-wAweiGTn38CY2DSwAaEffed6iMeflc0FMiuptanbN4J+ib+342gKGpvYRWubPd/+ sha512-QHEb6jOC8SaGTmYmGU19u2FhIfeG+t/hSacIWPpDzOp5yygnthL3JwnilM7LM1dOAbJv62R+/FICfsrKUqv4Gg==\"
            crossorigin=\"anonymous\">
    </head>

    <body>
        <div class=\"grid-container text-center\">
            <div class=\"grid-x grid-paddin-x\">
                <div class=\"cell\">
                    <h1>";
        // line 21
        $this->displayBlock('errorCode', $context, $blocks);
        echo "</h1>
                    <h3 class=\"font-bold\">";
        // line 22
        $this->displayBlock('titleError', $context, $blocks);
        echo "</h3>
                    <p>
                        ";
        // line 24
        $this->displayBlock('message', $context, $blocks);
        // line 25
        echo "                    </p>
                </div>
            </div>

            ";
        // line 29
        $this->displayBlock('trace', $context, $blocks);
        // line 30
        echo "        </div>

        <script src=\"https://cdn.jsdelivr.net/npm/foundation-sites@6.4.3/dist/js/foundation.min.js\" integrity=\"sha256-mRYlCu5EG+ouD07WxLF8v4ZAZYCA6WrmdIXyn1Bv9Vk= sha384-KzKofw4qqetd3kvuQ5AdapWPqV1ZI+CnfyfEwZQgPk8poOLWaabfgJOfmW7uI+AV sha512-0gHfaMkY+Do568TgjJC2iMAV0dQlY4NqbeZ4pr9lVUTXQzKu8qceyd6wg/3Uql9qA2+3X5NHv3IMb05wb387rA==\"
            crossorigin=\"anonymous\"></script>
    </body>

</html>";
    }

    // line 5
    public function block_title($context, array $blocks = array())
    {
    }

    // line 21
    public function block_errorCode($context, array $blocks = array())
    {
    }

    // line 22
    public function block_titleError($context, array $blocks = array())
    {
    }

    // line 24
    public function block_message($context, array $blocks = array())
    {
    }

    // line 29
    public function block_trace($context, array $blocks = array())
    {
    }

    public function getTemplateName()
    {
        return "layouts/errors.twig";
    }

    public function getDebugInfo()
    {
        return array (  102 => 29,  97 => 24,  92 => 22,  87 => 21,  82 => 5,  72 => 30,  70 => 29,  64 => 25,  62 => 24,  57 => 22,  53 => 21,  34 => 5,  28 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "layouts/errors.twig", "/var/www/src/views/layouts/errors.twig");
    }
}
