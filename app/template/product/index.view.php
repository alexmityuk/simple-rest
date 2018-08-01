<br>
<br>
<br>
<br>

<p>Product list</p>

<div class="products">
    <table>
        <tr>
            <td><b>Name</b></td>
        </tr>
        <?php foreach($products as $product) { ?>
            <tr>
                <td><a href="products/<?php echo $product->getId() ?>"><?php echo $product->getName(); ?></a></td>
            </tr>
        <?php } ?>
    </table>
</div>
