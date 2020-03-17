<?php if ($this->pageCount > 1): ?>
<ul class="pagination">
    <?php if ($this->first != $this->current): ?>
    <!-- First page link -->
    <li>
        <a href="<?php echo html_escape($this->url(array('page' => $this->first), null, $_GET)); ?>"><i class="fa fa-angle-double-left"></i></a>
    </li>
    <?php endif; ?>
    <?php if (isset($this->previous)): ?>
    <!-- Previous page link -->
    <li class="pagination_previous">
        <a href="<?php echo html_escape($this->url(array('page' => $this->previous), null, $_GET)); ?>"><i class="fa fa-angle-left"></i></a>
    </li>
    <?php endif; ?>
    <!-- Numbered page links -->
    <?php foreach ($this->pagesInRange as $page): ?>
        <?php if ($page != $this->current): ?>
    <li><a href="<?php echo html_escape($this->url(array('page' => $page), null, $_GET)); ?>"><?php echo $page; ?></a></li>
        <?php else: ?>
    <li class="current active"><span><?php echo $page; ?></span></li>
        <?php endif; ?>
    <?php endforeach; ?>
    <?php if (isset($this->next)): ?>
    <!-- Next page link -->
    <li class="pagination_next">
        <a href="<?php echo html_escape($this->url(array('page' => $this->next), null, $_GET)); ?>"><i class="fa fa-angle-right"></i></a>
    </li>
    <?php endif; ?>
    <?php if ($this->last != $this->current): ?>
    <!-- Last page link -->
    <li class="pagination_last">
        <a href="<?php echo html_escape($this->url(array('page' => $this->last), null, $_GET)); ?>"><i class="fa fa-angle-double-right"></i></a>
    </li>
    <?php endif; ?>
</ul>
<?php endif; ?>
