<?php

declare(strict_types=1);

namespace ErdmannFreunde\TornadoThemeBundle\ContaoManager;

use Contao\CoreBundle\ContaoCoreBundle;
use Contao\ManagerPlugin\Bundle\BundlePluginInterface;
use Contao\ManagerPlugin\Bundle\Config\BundleConfig;
use Contao\ManagerPlugin\Bundle\Parser\ParserInterface;
use Contao\NewsBundle\ContaoNewsBundle;
use ErdmannFreunde\TornadoThemeBundle\TornadoThemeBundle;
use EuF\PortfolioBundle\EuFPortfolioBundle;

class Plugin implements BundlePluginInterface
{
    public function getBundles(ParserInterface $parser): array
    {
        return [
            // Nach dem Portfolio- und dem News-Bundle laden, sonst gewinnen
            // deren Templates vor den Twig-Templates des Themes. Das
            // News-Bundle ist optional; fehlt es, ignoriert Contao den Eintrag.
            BundleConfig::create(TornadoThemeBundle::class)
                ->setLoadAfter([ContaoCoreBundle::class, EuFPortfolioBundle::class, ContaoNewsBundle::class]),
        ];
    }
}
