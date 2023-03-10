<?php


// Resets
if ($props['overlay_link']) { $props['title_link'] = ''; }

// New logic shortcuts
$props['overlay_cover'] = $props['overlay_style'] && $props['overlay_mode'] == 'cover';

$el = $this->el('div', [

    'uk-filter' => $tags ? [
        'target: .js-filter;',
        'animation: {filter_animation};',
    ] : false,

]);

// Grid
$grid = $this->el('div', [

    'class' => [
        'js-filter' => $tags,
        'uk-child-width-[1-{@!grid_default: auto}]{grid_default}',
        'uk-child-width-[1-{@!grid_small: auto}]{grid_small}@s',
        'uk-child-width-[1-{@!grid_medium: auto}]{grid_medium}@m',
        'uk-child-width-[1-{@!grid_large: auto}]{grid_large}@l',
        'uk-child-width-[1-{@!grid_xlarge: auto}]{grid_xlarge}@xl',
        'uk-flex-center {@grid_column_align}',
        'uk-flex-middle {@grid_row_align}',
        $props['grid_column_gap'] == $props['grid_row_gap'] ? 'uk-grid-{grid_column_gap}' : '[uk-grid-column-{grid_column_gap}] [uk-grid-row-{grid_row_gap}]',
        'uk-grid-divider {@grid_divider} {@!grid_column_gap:collapse} {@!grid_row_gap:collapse}',
    ],

    'uk-grid' => $this->expr([
        'masonry: {grid_masonry};',
        'parallax: {grid_parallax};',
    ], $props) ?: true,

    'uk-lightbox' => [
        'toggle: a[data-type];' => $props['lightbox'],
    ],

]);

// Orientation
$cell = $this->el('div', [

    'class' => [
        'uk-flex uk-flex-center uk-flex-middle {@image_orientation}',
    ],

]);

// Filter
$filter_grid = $this->el('div', [

    'class' => [
        'uk-child-width-expand',
        $props['filter_grid_column_gap'] == $props['filter_grid_row_gap'] ? 'uk-grid-{filter_grid_column_gap}' : '[uk-grid-column-{filter_grid_column_gap}] [uk-grid-row-{filter_grid_row_gap}]',
    ],

    'uk-grid' => true,
]);

$filter_cell = $this->el('div', [

    'class' => [
        'uk-width-{filter_grid_width}@{filter_grid_breakpoint}',
        'uk-flex-last@{filter_grid_breakpoint} {@filter_position: right}',
    ],

]);

?>

<?php if ($tags) : ?>
    <?= $el($props, $attrs) ?>

    <?php if ($filter_horizontal = in_array($props['filter_position'], ['left', 'right'])) : ?>
        <?= $filter_grid($props) ?>
        <?= $filter_cell($props) ?>
    <?php endif ?>

    <?= $this->render("{$__dir}/template-nav", compact('props')) ?>

    <?php if ($filter_horizontal) : ?>
        </div>
        <div>
    <?php endif ?>
    <?= $grid($props) ?>
    <?php foreach ($children as $child) : ?>
        <?= $cell($props, ['data-tag' => $child->tags], $builder->render($child, ['element' => $props])) ?>
    <?php endforeach ?>
    </div>

    <?php if ($filter_horizontal) : ?>
        </div>
        </div>
    <?php endif ?>

    </div>
<?php else : ?>
    <?= $el($props, $attrs) ?>


    <?php
//###############################################################################################

    if(!empty($children[0]->props['bildpfad'])){
        $path = JPATH_SITE . '/' . $children[0]->props['bildpfad'];

        $files = JFolder::files($path, '.', false, false,array(), array('.pdf'));
        $newChildren = [];

        foreach($files as $file){
            $content = [
                'type' => 'gallery_item',
                'props' => [
                    'title' => '',
                    'image' => '/' . $children[0]->props['bildpfad'] . $file
                ]
            ];
            $newChildren[] =  (object) $content;
        };
        $app = Joomla\CMS\Factory::getApplication();


        if($app->getName() === 'site')
        {
            $children = $newChildren;
        }
    }
    else if(!empty($children[0]->props['galleryfield']))
    {
        $images = explode(',', substr($children[0]->props['galleryfield'], 0, -1));

        $newChildren = [];

        foreach($images as $image){
            $content = [
                'type' => 'gallery_item',
                'props' => [
                    'title' => '',
                    'image' => '/' . $image
                ]
            ];
            $newChildren[] =  (object) $content;
        };
        $app = Joomla\CMS\Factory::getApplication();

        if($app->getName() === 'site')
        {
            $children = $newChildren;
        }
    }


//###############################################################################################

    ?>

    <?= $grid($props) ?>
    <?php foreach ($children as $child) : ?>

        <?= $cell($props, $builder->render($child, ['element' => $props])) ?>
    <?php endforeach ?>
    </div>

    </div>
<?php endif ?>
