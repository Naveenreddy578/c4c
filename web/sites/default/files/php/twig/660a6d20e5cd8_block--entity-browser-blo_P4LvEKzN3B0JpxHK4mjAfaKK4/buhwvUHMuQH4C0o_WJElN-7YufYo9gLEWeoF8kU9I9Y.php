<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* themes/custom/cloudc/templates/block--entity-browser-block--block-html.html.twig */
class __TwigTemplate_8e406c1c297a25b6c8edd71bd9613b3d extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
            'content' => [$this, 'block_content'],
        ];
        $this->sandbox = $this->env->getExtension('\Twig\Extension\SandboxExtension');
        $this->checkSecurity();
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 49
        $context["classes"] = [0 => "block", 1 => ("block-" . \Drupal\Component\Utility\Html::getClass($this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source,         // line 51
($context["configuration"] ?? null), "provider", [], "any", false, false, true, 51), 51, $this->source))), 2 => ("block-" . \Drupal\Component\Utility\Html::getClass($this->sandbox->ensureToStringAllowed(        // line 52
($context["plugin_id"] ?? null), 52, $this->source))), 3 => "clearfix", 4 => "three-col-layout-settings"];
        // line 57
        echo "<section";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["attributes"] ?? null), "addClass", [0 => ($context["classes"] ?? null)], "method", false, false, true, 57), 57, $this->source), "html", null, true);
        echo ">
  ";
        // line 58
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["title_prefix"] ?? null), 58, $this->source), "html", null, true);
        echo "
  ";
        // line 59
        if (($context["label"] ?? null)) {
            // line 60
            echo "    <h2";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["title_attributes"] ?? null), "addClass", [0 => "block-title"], "method", false, false, true, 60), 60, $this->source), "html", null, true);
            echo ">";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["label"] ?? null), 60, $this->source), "html", null, true);
            echo "</h2>
  ";
        }
        // line 62
        echo "  ";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["title_suffix"] ?? null), 62, $this->source), "html", null, true);
        echo "

  ";
        // line 64
        $this->displayBlock('content', $context, $blocks);
        // line 67
        echo "</section>

";
    }

    // line 64
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 65
        echo "    ";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["content"] ?? null), 65, $this->source), "html", null, true);
        echo "
  ";
    }

    public function getTemplateName()
    {
        return "themes/custom/cloudc/templates/block--entity-browser-block--block-html.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  81 => 65,  77 => 64,  71 => 67,  69 => 64,  63 => 62,  55 => 60,  53 => 59,  49 => 58,  44 => 57,  42 => 52,  41 => 51,  40 => 49,);
    }

    public function getSourceContext()
    {
        return new Source("", "themes/custom/cloudc/templates/block--entity-browser-block--block-html.html.twig", "D:\\Wamp\\www\\cloudc\\web\\themes\\custom\\cloudc\\templates\\block--entity-browser-block--block-html.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("set" => 49, "if" => 59, "block" => 64);
        static $filters = array("clean_class" => 51, "escape" => 57);
        static $functions = array();

        try {
            $this->sandbox->checkSecurity(
                ['set', 'if', 'block'],
                ['clean_class', 'escape'],
                []
            );
        } catch (SecurityError $e) {
            $e->setSourceContext($this->source);

            if ($e instanceof SecurityNotAllowedTagError && isset($tags[$e->getTagName()])) {
                $e->setTemplateLine($tags[$e->getTagName()]);
            } elseif ($e instanceof SecurityNotAllowedFilterError && isset($filters[$e->getFilterName()])) {
                $e->setTemplateLine($filters[$e->getFilterName()]);
            } elseif ($e instanceof SecurityNotAllowedFunctionError && isset($functions[$e->getFunctionName()])) {
                $e->setTemplateLine($functions[$e->getFunctionName()]);
            }

            throw $e;
        }

    }
}
