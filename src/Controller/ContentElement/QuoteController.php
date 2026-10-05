<?php

declare(strict_types=1);

namespace ErdmannFreunde\TornadoThemeBundle\Controller\ContentElement;

use Contao\ContentModel;
use Contao\CoreBundle\Controller\ContentElement\AbstractContentElementController;
use Contao\CoreBundle\DependencyInjection\Attribute\AsContentElement;
use Contao\CoreBundle\Image\Studio\Studio;
use Contao\CoreBundle\Twig\FragmentTemplate;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Zitat bzw. Kundenstimme: Text, Name, Zusatzzeile, optionale Bewertung und
 * optionales Bild. Feldnamen wie im Zitat-Element von SOLO.
 */
#[AsContentElement(category: 'texts')]
class QuoteController extends AbstractContentElementController
{
    public function __construct(private readonly Studio $studio)
    {
    }

    protected function getResponse(FragmentTemplate $template, ContentModel $model, Request $request): Response
    {
        // In Absätze aufteilen (Leerzeile = neuer Absatz, einfacher Umbruch = <br>).
        // Der Wert ist durch basicEntities bereits HTML-sicher (z. B. [-] -> &shy;),
        // daher im Template roh ausgeben.
        $paragraphs = array_map(
            static fn (string $paragraph): string => nl2br(trim($paragraph), false),
            preg_split('/\R{2,}/u', trim((string) $model->quote_text), -1, PREG_SPLIT_NO_EMPTY) ?: [],
        );

        $template->set('quote_paragraphs', $paragraphs);
        $template->set('quote_author', $model->quote_author ?: '');
        $template->set('quote_meta', $model->quote_meta ?: '');
        $template->set('quote_rating', min(5, max(0, (int) $model->quote_rating)));

        $figure = !$model->addImage ? null : $this->studio
            ->createFigureBuilder()
            ->fromUuid($model->singleSRC ?: '')
            ->setSize($model->size)
            ->setOverwriteMetadata($model->getOverwriteMetadata())
            ->enableLightbox($model->fullsize)
            ->buildIfResourceExists()
        ;

        $template->set('image', $figure);
        $template->set('layout', $model->floating);

        return $template->getResponse();
    }
}
