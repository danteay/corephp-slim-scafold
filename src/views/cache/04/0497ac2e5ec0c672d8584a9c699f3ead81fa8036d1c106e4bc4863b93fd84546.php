<?php

/* sections/errors/trace.twig */
class __TwigTemplate_ddf954615705973ce6a7eed7eb2a11e79dfce8a37e27e26aabda4e10e0e62c23 extends Twig_Template
{
    private $source;

    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = array(
            'traceMessage' => array($this, 'block_traceMessage'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<div class=\"grid-x grid-padding-x\">
    <div class=\"cell\">
        <h4>Trace</h4>
        <hr>
    </div>
</div>

<div class=\"grid-x grid-padding-x\">
    <div class=\"cell\">
        <pre style='text-align: left;'>";
        // line 10
        $this->displayBlock('traceMessage', $context, $blocks);
        echo "</pre>
    </div>
</div>";
    }

    public function block_traceMessage($context, array $blocks = array())
    {
    }

    public function getTemplateName()
    {
        return "sections/errors/trace.twig";
    }

    public function getDebugInfo()
    {
        return array (  35 => 10,  24 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "sections/errors/trace.twig", "/var/www/src/views/sections/errors/trace.twig");
    }
}
