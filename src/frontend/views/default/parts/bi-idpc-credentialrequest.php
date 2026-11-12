<?php

/**
 * Aria S.p.A.
 * OPEN 2.0
 *
 * @package   open2\cms-module-userauth
 * @author    Aria S.p.A. <protocollo@pec.ariaspa.it>
 * @license   GNU General Public License v3.0 <https://www.gnu.org/licenses/gpl-3.0.html>
 * @link      https://www.ariaspa.it/
 *
 * This file is part of OPEN 2.0.
 *
 * OPEN 2.0 is free software: you can redistribute it and/or modify it
 * under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * OPEN 2.0 is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with OPEN 2.0. If not, see <https://www.gnu.org/licenses/>.
 */

use amos\userauth\frontend\Module;;

use open20\amos\core\helpers\Html;
use yii\helpers\Url;

/**
 * @var $socialAuthModule \open20\amos\socialauth\Module
 */
$socialAuthModule = Yii::$app->getModule('socialauth');
$theModule = Module::instance();
?>

<?php if ($socialAuthModule && $theModule->enableCredentialRequest) : ?>
    <div class="pua-request-credential">
        <?php if (!$hideIdpcButtonInfo) : ?>
            <div class="border-bottom border-light pb-3 mb-4">
                <?php if (!$hideIdpcButtonTitle) : ?>
                    <h3 class="h5"><?= Module::t('Richiedi le credenziali di accesso') ?></h3>
                <?php endif ?>
                <?php if (!$hideIdpcButtonSubtitle) : ?>
                    <p class="mb-0"><?= Module::t("Clicca sul pulsante in basso per richiedere le credenziali: 
                    la tua domanda sarà verificata e, se approvata, riceverai un invito via mail per registrarti in piattaforma.") ?></p>
                <?php endif ?>
            </div>
        <?php endif ?>
        <?=
            Html::a(
                Html::tag('span', Module::t('Richiedi credenziali')),
                Url::to('/userauthfrontend/default/credential-request', 'https'),
                [
                    'class' => 'btn btn-icon rounded-0 btn-spid text-uppercase',
                    'title' => Module::t('Richiedi le credenziali'),
                ]
            )
        ?>
    </div>

    <?php else : ?>
        <div class="pua-request-credential">
            <?php if (!$hideIdpcButtonInfo) : ?>
                <div class="border-bottom border-light pb-3 mb-4">
                    <?php if (!$hideIdpcButtonTitle) : ?>
                        <h3 class="h5"><?= Module::t('Richiedi le credenziali di accesso') ?></h3>
                    <?php endif ?>
                    <?php if (!$hideIdpcButtonSubtitle) : ?>
                        <p class="mb-0"><?= Module::t("Clicca sul pulsante in basso per richiedere le credenziali: 
                        la tua domanda sarà verificata e, se approvata, riceverai un invito via mail per registrarti in piattaforma.") ?></p>
                    <?php endif ?>
                <h6><?= Module::t("Attualmente, la funzionalità di richiesta delle credenziali è disabilitata.") ?></h6>
            <?php endif ?>
        </div>
        <?=
            Html::a(
                Html::tag('span', Module::t('Richiedi credenziali'), ['disabled' => true]),
                Url::to('/userauthfrontend/default/credential-request', 'https'),
                [
                    'class' => 'btn btn-icon rounded-0 btn-spid text-uppercase disabled',
                    'title' => Module::t('Attualmente, la funzionalità di richiesta delle credenziali è disabilitata.'),
                ]
            )
        ?>
    </div>
<?php endif; ?>

