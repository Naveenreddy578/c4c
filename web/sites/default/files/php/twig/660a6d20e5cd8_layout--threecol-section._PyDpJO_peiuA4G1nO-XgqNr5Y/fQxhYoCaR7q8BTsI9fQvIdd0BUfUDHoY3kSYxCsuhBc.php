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

/* themes/custom/cloudc/templates/layout--threecol-section.html.twig */
class __TwigTemplate_eb89192e571a57ba5bcb962bb4e871b3 extends Template
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
        // line 14
        echo "<div class=\"container c4c\">
";
        // line 15
        if (($context["content"] ?? null)) {
            // line 16
            echo "  ";
            if (twig_get_attribute($this->env, $this->source, ($context["content"] ?? null), "title", [], "any", false, false, true, 16)) {
                // line 17
                echo "  <div class=\"";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, twig_join_filter($this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["content"] ?? null), "title", [], "any", false, false, true, 17), "attributes", [], "any", false, false, true, 17), "class", [], "any", false, false, true, 17), 17, $this->source), " "), "html", null, true);
                echo "\">
    ";
                // line 18
                if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["content"] ?? null), "title", [], "any", false, false, true, 18), "wrapper", [], "any", false, false, true, 18)) {
                    echo "<";
                    echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["content"] ?? null), "title", [], "any", false, false, true, 18), "wrapper", [], "any", false, false, true, 18), 18, $this->source), "html", null, true);
                    echo ">";
                }
                // line 19
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["content"] ?? null), "title", [], "any", false, false, true, 19), "label", [], "any", false, false, true, 19), 19, $this->source), "html", null, true);
                // line 20
                if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["content"] ?? null), "title", [], "any", false, false, true, 20), "wrapper", [], "any", false, false, true, 20)) {
                    echo "</";
                    echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["content"] ?? null), "title", [], "any", false, false, true, 20), "wrapper", [], "any", false, false, true, 20), 20, $this->source), "html", null, true);
                    echo ">";
                }
                // line 21
                echo "    </div>
    <hr class=\"hr-class\">
  ";
            }
            // line 24
            echo "  <div";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["attributes"] ?? null), "addClass", [0 => ($context["classes"] ?? null)], "method", false, false, true, 24), 24, $this->source), "html", null, true);
            echo ">
    ";
            // line 25
            if (twig_get_attribute($this->env, $this->source, ($context["content"] ?? null), "first", [], "any", false, false, true, 25)) {
                // line 26
                echo "      <div ";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["region_attributes"] ?? null), "first", [], "any", false, false, true, 26), "addClass", [0 => "layout__region", 1 => "layout__region--first"], "method", false, false, true, 26), 26, $this->source), "html", null, true);
                echo ">
        ";
                // line 27
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["content"] ?? null), "first", [], "any", false, false, true, 27), 27, $this->source), "html", null, true);
                echo "
      </div>
    ";
            }
            // line 30
            echo "
    ";
            // line 31
            if (twig_get_attribute($this->env, $this->source, ($context["content"] ?? null), "second", [], "any", false, false, true, 31)) {
                // line 32
                echo "      <div ";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["region_attributes"] ?? null), "second", [], "any", false, false, true, 32), "addClass", [0 => "layout__region", 1 => "layout__region--second"], "method", false, false, true, 32), 32, $this->source), "html", null, true);
                echo ">
        ";
                // line 33
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["content"] ?? null), "second", [], "any", false, false, true, 33), 33, $this->source), "html", null, true);
                echo "
      </div>
    ";
            }
            // line 36
            echo "
    ";
            // line 37
            if (twig_get_attribute($this->env, $this->source, ($context["content"] ?? null), "third", [], "any", false, false, true, 37)) {
                // line 38
                echo "      <div ";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["region_attributes"] ?? null), "third", [], "any", false, false, true, 38), "addClass", [0 => "layout__region", 1 => "layout__region--third"], "method", false, false, true, 38), 38, $this->source), "html", null, true);
                echo ">
        ";
                // line 39
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["content"] ?? null), "third", [], "any", false, false, true, 39), 39, $this->source), "html", null, true);
                echo "
      </div>
    ";
            }
            // line 42
            echo "
  </div>
";
        }
        // line 45
        echo "</div>";
    }

    public function getTemplateName()
    {
        return "themes/custom/cloudc/templates/layout--threecol-section.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  126 => 45,  121 => 42,  115 => 39,  110 => 38,  108 => 37,  105 => 36,  99 => 33,  94 => 32,  92 => 31,  89 => 30,  83 => 27,  78 => 26,  76 => 25,  71 => 24,  66 => 21,  60 => 20,  58 => 19,  52 => 18,  47 => 17,  44 => 16,  42 => 15,  39 => 14,);
    }

    public function getSourceContext()
    {
        return new Source("", "themes/custom/cloudc/templates/layout--threecol-section.html.twig", "D:\\Wamp\\www\\cloudc\\web\\themes\\custom\\cloudc\\templates\\layout--threecol-section.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("if" => 15);
        static $filters = array("escape" => 17, "join" => 17);
        static $functions = array();

        try {
            $this->sandbox->checkSecurity(
                ['if'],
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
