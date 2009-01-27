<?php
$options = array(
  'title'   => __('Search Communities'),
  'url'    => 'community/search',
  'button' => __('Search'),
  'moreInfo' => array(link_to(__('Create a new community'), 'community/edit'))
);

op_include_form('searchCommunity', $filters, $options);
?>

<?php if ($pager->getNbResults()): ?>

<?php
$list = array();
foreach ($pager->getResults() as $key => $community)
{
  $list[$key] = array();
  $list[$key][__('Community Name')] = $community->getName();
  $list[$key][__('Count of Members')] = $community->countCommunityMembers();
  $list[$key][__('Description')] = $community->getConfig('description');
}

$options = array(
  'title'          => __('Search Results'),
  'pager'          => $pager,
  'link_to_page'   => 'community/search?page=%d',
  'link_to_detail' => 'community/home?id=%d',
  'list'           => $list,
);

op_include_parts('searchResultList', 'searchCommunityResult', $options);
?>
<?php else: ?>
<?php op_include_box('searchCommunityResult', __('Your search queries did not match any communites.'), array('title' => __('Search Results'))) ?>
<?php endif; ?>
