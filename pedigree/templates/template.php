<h3>Pedigree</h3>

<div class="uk-overflow-auto" id="pedigree">
    <table class="uk-table uk-table-middle" >
        <tbody>
        <tr>
            <td rowspan="4">
                <?php
                    if(empty($props['gen1a-link']))
                    {
                        echo $props['gen1a'];
                    }
                    else{
                        echo '<a href="' . $props['gen1a-link'] . '">' . $props['gen1a'] . '</a>';
                    }
                ?>
            </td>
            <td rowspan="2">
                <?php
                if(empty($props['gen2a-link']))
                {
                    echo $props['gen2a'];
                }
                else{
                    echo '<a href="' . $props['gen2a-link'] . '">' . $props['gen2a'] . '</a>';
                }
                ?>
            </td>
            <td><?= $props['gen3a'];?></td>
        </tr>
        <tr>
            <td><?= $props['gen3b'];?></td>
        </tr>
        <tr>
            <td rowspan="2">
                <?php
                if(empty($props['gen2b-link']))
                {
                    echo $props['gen2b'];
                }
                else{
                    echo '<a href="' . $props['gen2b-link'] . '">' . $props['gen2b'] . '</a>';
                }
                ?>
            </td>
            <td><?= $props['gen3c'];?></td>
        </tr>
        <tr>
            <td><?= $props['gen3d'];?></td>
        </tr>
        <tr>
            <td rowspan="4">
                <?php
                if(empty($props['gen1b-link']))
                {
                    echo $props['gen1b'];
                }
                else{
                    echo '<a href="' . $props['gen1b-link'] . '">' . $props['gen1b'] . '</a>';
                }
                ?>
            </td>
            <td rowspan="2">
                <?php
                if(empty($props['gen2c-link']))
                {
                    echo $props['gen2c'];
                }
                else{
                    echo '<a href="' . $props['gen2c-link'] . '">' . $props['gen2c'] . '</a>';
                }
                ?>
            </td>
            <td><?= $props['gen3e'];?></td>
        </tr>
        <tr>
            <td><?= $props['gen3f'];?></td>
        </tr>
        <tr>
            <td rowspan="2">
                <?php
                if(empty($props['gen2d-link']))
                {
                    echo $props['gen2d'];
                }
                else{
                    echo '<a href="' . $props['gen2d-link'] . '">' . $props['gen2d'] . '</a>';
                }
                ?>
            </td>
            <td><?= $props['gen3g'];?></td>
        </tr>
        <tr>
            <td><?= $props['gen3h'];?></td>
        </tr>
        </tbody>
    </table>
</div>