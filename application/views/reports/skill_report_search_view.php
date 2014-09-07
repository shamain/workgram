
<?php
$i = 0;
print_r(results);die;
foreach ($results as $skill) {
    ?> 
    <tr  id="skills_<?php echo $skill->skill_code; ?>">
        <td><?php echo ++$i; ?></td>
        <td><?php echo $skill->skill_name; ?></td>
        <td>
            <?php echo $skill->skill_cat_name; ?> 
        </td>
    </tr>
<?php } ?>    


