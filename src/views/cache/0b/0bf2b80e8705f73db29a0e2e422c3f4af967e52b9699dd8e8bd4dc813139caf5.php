<?php

/* errors/500.twig */
class __TwigTemplate_dd36ac13160b958e94f2cb2696df1a65b995f9d30f567b1a097ae41d617e7e47 extends Twig_Template
{
    private $source;

    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        // line 1
        $this->parent = $this->loadTemplate("layouts/errors.twig", "errors/500.twig", 1);
        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'errorCode' => array($this, 'block_errorCode'),
            'titleError' => array($this, 'block_titleError'),
            'message' => array($this, 'block_message'),
            'trace' => array($this, 'block_trace'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "layouts/errors.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_title($context, array $blocks = array())
    {
        echo "Internal Server Error";
    }

    // line 5
    public function block_errorCode($context, array $blocks = array())
    {
        echo "500";
    }

    // line 7
    public function block_titleError($context, array $blocks = array())
    {
        echo "An Unexpected error apear, plase return and try again...";
    }

    // line 9
    public function block_message($context, array $blocks = array())
    {
        // line 10
        echo "    ";
        echo twig_escape_filter($this->env, ($context["message"] ?? null), "html", null, true);
        echo "
";
    }

    // line 13
    public function block_trace($context, array $blocks = array())
    {
        // line 14
        echo "    ";
        if (($context["showTrace"] ?? null)) {
            // line 15
            echo "        ";
            $this->loadTemplate("errors/500.twig", "errors/500.twig", 15, "831875353")->display($context);
            // line 20
            echo "    ";
        }
    }

    public function getTemplateName()
    {
        return "errors/500.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  73 => 20,  70 => 15,  67 => 14,  64 => 13,  57 => 10,  54 => 9,  48 => 7,  42 => 5,  36 => 3,  15 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "errors/500.twig", "/var/www/src/views/errors/500.twig");
    }
}


/* errors/500.twig */
class __TwigTemplate_dd36ac13160b958e94f2cb2696df1a65b995f9d30f567b1a097ae41d617e7e47_831875353 extends Twig_Template
{
    private $source;

    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        // line 15
        $this->parent = $this->loadTemplate("sections/errors/trace.twig", "errors/500.twig", 15);
        $this->blocks = array(
            'traceMessage' => array($this, 'block_traceMessage'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "sections/errors/trace.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 16
    public function block_traceMessage($context, array $blocks = array())
    {
        // line 17
        echo "                ";
        echo twig_escape_filter($this->env, ($context["trace"] ?? null), "html", null, true);
        echo "
            ";
    }

    public function getTemplateName()
    {
        return "errors/500.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  131 => 17,  128 => 16,  111 => 15,  73 => 20,  70 => 15,  67 => 14,  64 => 13,  57 => 10,  54 => 9,  48 => 7,  42 => 5,  36 => 3,  15 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "errors/500.twig", "/var/www/src/views/errors/500.twig");
    }
}
