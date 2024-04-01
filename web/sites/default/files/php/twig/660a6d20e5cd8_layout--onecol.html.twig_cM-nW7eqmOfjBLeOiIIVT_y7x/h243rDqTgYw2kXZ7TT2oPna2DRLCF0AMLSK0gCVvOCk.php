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

/* themes/custom/cloudc/templates/layout--onecol.html.twig */
class __TwigTemplate_548120bdb0bd8ebc7c0474a7fd74073f extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
        ];
        $this->sandbox = $this->env->getExtension('\Twig\Extension\SandboxExtension');
        $this->checkSecurity();
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 15
        $context["classes"] = [0 => "layout", 1 => "layout--onecol"];
        // line 20
        echo "
";
        // line 21
        if (($context["content"] ?? null)) {
            // line 22
            echo "  <div";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["attributes"] ?? null), "addClass", [0 => ($context["classes"] ?? null)], "method", false, false, true, 22), 22, $this->source), "html", null, true);
            echo ">
    ";
            // line 23
            if (twig_get_attribute($this->env, $this->source, ($context["content"] ?? null), "title", [], "any", false, false, true, 23)) {
                // line 24
                echo "      <div class=\"";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, twig_join_filter($this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["content"] ?? null), "title", [], "any", false, false, true, 24), "attributes", [], "any", false, false, true, 24), "class", [], "any", false, false, true, 24), 24, $this->source), " "), "html", null, true);
                echo "\">
        ";
                // line 25
                if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["content"] ?? null), "title", [], "any", false, false, true, 25), "wrapper", [], "any", false, false, true, 25)) {
                    echo "<";
                    echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["content"] ?? null), "title", [], "any", false, false, true, 25), "wrapper", [], "any", false, false, true, 25), 25, $this->source), "html", null, true);
                    echo ">";
                }
                // line 26
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["content"] ?? null), "title", [], "any", false, false, true, 26), "label", [], "any", false, false, true, 26), 26, $this->source), "html", null, true);
                // line 27
                if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["content"] ?? null), "title", [], "any", false, false, true, 27), "wrapper", [], "any", false, false, true, 27)) {
                    echo "</";
                    echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["content"] ?? null), "title", [], "any", false, false, true, 27), "wrapper", [], "any", false, false, true, 27), 27, $this->source), "html", null, true);
                    echo ">";
                }
                // line 28
                echo "      </div>
      <hr class=\"hr-class\">
    ";
            }
            // line 31
            echo "    <div ";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["region_attributes"] ?? null), "content", [], "any", false, false, true, 31), "addClass", [0 => "layout__region", 1 => "layout__region--content"], "method", false, false, true, 31), 31, $this->source), "html", null, true);
            echo ">
       ";
            // line 32
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["content"] ?? null), "content", [], "any", false, false, true, 32), 32, $this->source), "html", null, true);
            echo "
    </div>
  </div>
";
        }
    }

    public function getTemplateName()
    {
        return "themes/custom/cloudc/templates/layout--onecol.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  82 => 32,  77 => 31,  72 => 28,  66 => 27,  64 => 26,  58 => 25,  53 => 24,  51 => 23,  46 => 22,  44 => 21,  41 => 20,  39 => 15,);
    }

    public function getSourceContext()
    {
        return new Source("", "themes/custom/cloudc/templates/layout--onecol.html.twig", "D:\\Wamp\\www\\cloudc\\web\\themes\\custom\\cloudc\\templates\\layout--onecol.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("set" => 15, "if" => 21);
        static $filters = array("escape" => 22, "join" => 24);
        static $functions = array();

        try {
            $this->sandbox->checkSecurity(
                ['set', 'if'],
                ['escape', 'join'],
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
