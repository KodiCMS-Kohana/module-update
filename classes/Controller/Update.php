<?php defined( 'SYSPATH' ) or die( 'No direct access allowed.' );

/**
 * @package		KodiCMS/Update
 * @category	Controller
 * @author		butschster <butschster@gmail.com>
 * @link		http://kodicms.ru
 * @copyright	(c) 2012-2014 butschster
 * @license		http://www.gnu.org/licenses/old-licenses/lgpl-2.1.txt
 */
class Controller_Update extends Controller_System_Backend {
	
	public function before()
	{
		parent::before();

		$this->breadcrumbs
			->add(__('Update'), Route::get('backend')->uri(array('controller' => 'update')));
	}
	
	public function action_index() 
	{
		$this->set_title(__('Update'));
		$this->template->content = View::factory( 'update/index');
	}
	
	public function action_database() 
	{
		WYSIWYG::load_all();
		
		$this->set_title(__('Database'));
		
		$this->template->content = View::factory( 'update/database', array(
			'actions' => Update::check_database(FALSE),
		));
	}
}