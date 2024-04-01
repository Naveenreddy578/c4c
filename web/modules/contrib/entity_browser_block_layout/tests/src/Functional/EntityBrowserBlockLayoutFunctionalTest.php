<?php

namespace Drupal\Tests\entity_browser_block_layout\Functional;

use Drupal\Tests\BrowserTestBase;

/**
 * Functional tests.
 *
 * @group entity_browser_block_layout
 */
class EntityBrowserBlockLayoutFunctionalTest extends BrowserTestBase {

  /**
   * {@inheritdoc}
   */
  protected $defaultTheme = 'stark';

  /**
   * Tests.
   */
  public function test(): void {
    // Test that front page returns HTTP 200.
    $this->drupalGet('');
    $this->assertSession()->statusCodeEquals(200);
  }

}
