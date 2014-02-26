<?php
namespace namespaced\sub;

use Cubex\Kernel\ApplicationKernel;

class SubRoutable
{
  public function __toString()
  {
    return 'namespaced sub';
  }
}

class TestApplication extends ApplicationKernel
{
  public function subRouteTo()
  {
    return [
      '%sExtension',
    ];
  }

  public function defaultAction()
  {
    return 'test application';
  }
}


class RandomExtension extends ApplicationKernel
{
  public function renderTags($tagName)
  {
    return 'test tag ' . $tagName;
  }

  public function defaultAction($base = 'test', $type = 'extension')
  {
    return "$base $type";
  }
}