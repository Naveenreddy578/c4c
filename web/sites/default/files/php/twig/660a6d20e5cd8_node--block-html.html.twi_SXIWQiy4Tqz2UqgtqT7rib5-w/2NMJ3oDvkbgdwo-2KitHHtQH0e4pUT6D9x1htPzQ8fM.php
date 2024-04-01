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

/* themes/custom/cloudc/templates/node--block-html.html.twig */
class __TwigTemplate_6d934092f58c0fd9f32bbfb16daa6607 extends Template
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
        // line 68
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->attachLibrary("core/drupal.dialog.ajax"), "html", null, true);
        echo "
";
        // line 70
        $context["classes"] = [0 => \Drupal\Component\Utility\Html::getClass($this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source,         // line 71
($context["node"] ?? null), "bundle", [], "any", false, false, true, 71), 71, $this->source)), 1 => ((twig_get_attribute($this->env, $this->source,         // line 72
($context["node"] ?? null), "isPromoted", [], "method", false, false, true, 72)) ? ("is-promoted") : ("")), 2 => ((twig_get_attribute($this->env, $this->source,         // line 73
($context["node"] ?? null), "isSticky", [], "method", false, false, true, 73)) ? ("is-sticky") : ("")), 3 => (( !twig_get_attribute($this->env, $this->source,         // line 74
($context["node"] ?? null), "isPublished", [], "method", false, false, true, 74)) ? ("is-unpublished") : ("")), 4 => ((        // line 75
($context["view_mode"] ?? null)) ? (\Drupal\Component\Utility\Html::getClass($this->sandbox->ensureToStringAllowed(($context["view_mode"] ?? null), 75, $this->source))) : ("")), 5 => "clearfix"];
        // line 79
        echo "<article";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["attributes"] ?? null), "addClass", [0 => ($context["classes"] ?? null)], "method", false, false, true, 79), 79, $this->source), "html", null, true);
        echo ">
  ";
        // line 80
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["content"] ?? null), "field_image", [], "any", false, false, true, 80), 80, $this->source), "html", null, true);
        echo "
  <h2>";
        // line 81
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["label"] ?? null), 81, $this->source), "html", null, true);
        echo "</h2>
  ";
        // line 82
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["content"] ?? null), "body", [], "any", false, false, true, 82), 82, $this->source), "html", null, true);
        echo "
</article>
";
    }

    public function getTemplateName()
    {
        return "themes/custom/cloudc/templates/node--block-html.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  63 => 82,  59 => 81,  55 => 80,  50 => 79,  48 => 75,  47 => 74,  46 => 73,  45 => 72,  44 => 71,  43 => 70,  39 => 68,);
    }

    public function getSourceContext()
    {
        return new Source("", "themes/custom/cloudc/templates/node--block-html.html.twig", "D:\\Wamp\\www\\cloudc\\web\\themes\\custom\\cloudc\\templates\\node--block-html.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("set" => 70);
        static $filters = array("escape" => 68, "clean_class" => 71);
        static $functions = array("attach_library" => 68);

        try {
            $this->sandbox->checkSecurity(
                ['set'],
                ['escape', 'clean_class'],
                ['attach_library']
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
