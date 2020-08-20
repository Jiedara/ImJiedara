<!-- =========
Start Contact tab content section
===================================-->
<div id='cgv' class="tab-pane fade">
    <div class="body-content">
        <h3 class="title with-icon"><span class="fa fa-file-contract icn-title"></span> <?php __('cgv_title') ?> </h3>
        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
            <?php
                for ($i = 1; $i <= 24; $i++) {
            ?>
            <div class="panel panel-info">
                <div class="panel-heading" role="tab" id="heading <?= $i ?>">
                    <h4 class="panel-title">
                        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#article<?= $i ?>"
                           aria-expanded="true" aria-controls="article<?= $i ?>">
                            <?php __('cgv_article_title_' . $i) ?>
                        </a>
                    </h4>
                </div>
                <div id="article<?= $i ?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading <?= $i ?>">
                    <div class="panel-body">
                        <?php __('cgv_article_content_' . $i) ?>
                    </div>
                </div>
            </div>
            <?php
                }
            ?>
        </div>
    </div>
</div>

<!-- =========
End tab content section
===================================-->
