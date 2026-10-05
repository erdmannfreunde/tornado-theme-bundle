<?php

declare(strict_types=1);

namespace ErdmannFreunde\TornadoThemeBundle\InsertTag;

use Contao\CoreBundle\DependencyInjection\Attribute\AsInsertTag;
use Contao\CoreBundle\InsertTag\InsertTagResult;
use Contao\CoreBundle\InsertTag\OutputType;
use Contao\CoreBundle\InsertTag\ResolvedInsertTag;
use Contao\CoreBundle\InsertTag\Resolver\InsertTagResolverNestedResolvedInterface;

/**
 * Hebt Wörter in einer Überschrift in der Markenfarbe hervor.
 *
 * Contao erlaubt im Überschriftenfeld kein HTML. {{mark::angenehm warm}}
 * gibt deshalb <span class="mark">angenehm warm</span> aus. Bewusst kein
 * <mark>: Die Farbe ist reine Gestaltung, keine Markierung im Sinne von HTML.
 */
#[AsInsertTag('mark')]
class MarkInsertTag implements InsertTagResolverNestedResolvedInterface
{
    public function __invoke(ResolvedInsertTag $insertTag): InsertTagResult
    {
        $text = implode('::', $insertTag->getParameters()->all());

        return new InsertTagResult(
            '<span class="mark">'.htmlspecialchars($text, ENT_QUOTES | ENT_SUBSTITUTE | ENT_HTML5, 'UTF-8', false).'</span>',
            OutputType::html,
        );
    }
}
