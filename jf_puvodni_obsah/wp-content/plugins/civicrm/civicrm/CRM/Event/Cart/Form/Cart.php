<?php

require_once('CRM/Core/Form.php');
class CRM_Event_Cart_Form_Cart extends CRM_Core_Form
{
  public $cart;

  public $_action;
  public $contact;
  public $event_cart_id = null;
  public $_mode;
  public $participants;

  public function preProcess()
  {
    $this->_action = CRM_Utils_Request::retrieve( 'action', 'String', $this, false );
    $this->_mode = 'live';
    $this->loadCart( );

    $this->checkWaitingList( );

    $locationTypes = CRM_Core_PseudoConstant::locationType( );
    $this->_bltID = array_search( 'Billing', $locationTypes);
    $this->assign('bltID', $this->_bltID);
    if (!isset($this->discounts)) {
      $this->discounts = array();
    }
  }

  function loadCart( )
  {
	if ( $this->event_cart_id == null ) {
	  $this->cart = CRM_Event_Cart_BAO_Cart::find_or_create_for_current_session( );
	} else {
	  $this->cart = CRM_Event_Cart_BAO_Cart::find_by_id( $this->event_cart_id );
	}
        $this->cart->load_associations( );
        $this->stub_out_and_inherit( );
  }

  function stub_out_and_inherit( )
  {
	require_once 'CRM/Event/Cart/BAO/MerParticipant.php';
	require_once 'CRM/Core/Transaction.php';
	$transaction = new CRM_Core_Transaction( );

	foreach ( $this->cart->get_main_events_in_carts( ) as $event_in_cart ) {
	  if ( empty($event_in_cart->participants) ) {
		$participant = CRM_Event_Cart_BAO_MerParticipant::create( array(
                      'cart_id' => $this->cart->id,
		      'event_id' => $event_in_cart->event_id,
		      'contact_id' => self::find_or_create_contact(),
		) );
                $participant->save();
		$event_in_cart->add_participant( $participant );
	  }
          $event_in_cart->save();
	}
	$transaction->commit( );
  }

  function checkWaitingList( )
  {
	require_once 'CRM/Event/BAO/Participant.php';
	foreach ( $this->cart->events_in_carts as $event_in_cart )
	{
	  $empty_seats = $this->checkEventCapacity( $event_in_cart->event_id );
	  if ($empty_seats === null) {
		continue;
	  }
	  foreach ( $event_in_cart->participants as $participant ) {
		if ( $empty_seats <= 0 ) {
		  $participant->must_wait = true;
		}
		$empty_seats--;
	  }
	}
  }

  function checkEventCapacity( $event_id )
  {
	require_once 'CRM/Event/BAO/Participant.php';
	$empty_seats = CRM_Event_BAO_Participant::eventFull( $event_id, true );
	if (is_numeric($empty_seats)) {
	    return $empty_seats;
	} if (is_string($empty_seats)) {
	    return 0;
	} else {
	    return null;
	}
  }

  static function is_administrator()
  {
        global $user;
  	return CRM_Core_Permission::check( 'administer CiviCRM' );
  }

  function getContactID( )
  {
        //XXX when do we query 'cid' ?
	$tempID = CRM_Utils_Request::retrieve( 'cid', 'Positive', $this );

	// force to ignore the authenticated user /XXX any admin
	if ( $tempID === '0' ) {
	  return;
	}

	//check if this is a checksum authentication
	$userChecksum = CRM_Utils_Request::retrieve( 'cs', 'String', $this );
	if ( $userChecksum ) {
	  //check for anonymous user.
	  require_once 'CRM/Contact/BAO/Contact/Utils.php';
	  $validUser = CRM_Contact_BAO_Contact_Utils::validChecksum( $tempID, $userChecksum );
	  if ( $validUser ) return  $tempID;
	}

	// check if the user is registered and we have a contact ID
	$session = CRM_Core_Session::singleton( );
	return $session->get( 'userID' );
  }

  static function find_or_create_contact($fields = array())
  {
    require_once 'CRM/Dedupe/Finder.php';
    $dedupe_params = CRM_Dedupe_Finder::formatParams($fields, 'Individual');
    $dedupe_params['check_permission'] = false;
    $ids = CRM_Dedupe_Finder::dupesByParams($dedupe_params, 'Individual');

    if (empty($ids))
    {
      require_once 'CRM/Contact/BAO/Group.php';

      //XXX
      $params = array( 'name' => 'RegisteredByOther' );
      $values = array( );
      $group = CRM_Contact_BAO_Group::retrieve( $params, $values );
      $add_to_groups = array( );
      if ( $group != null ) {
        $add_to_groups[] = $group->id;
      }
      // still add the employer id of the signed in user  //???
      $contact_params = array(
        'email-Primary' => CRM_Utils_Array::value('email', $fields, null),
        'is_deleted' => CRM_Utils_Array::value('is_deleted', $fields, true),
      );
      $no_fields = array( );
      $contact_id = CRM_Contact_BAO_Contact::createProfileContact( $contact_params, $no_fields, null, $add_to_groups );
      if (!$contact_id) {
        CRM_Core_Error::displaySessionError("Could not create or match a contact with that email address.  Please contact the webmaster.");
      }
      return $contact_id;
    }
    else {
      return array_pop($ids);
    }
  }

  function getValuesForPage( $page_name )
  {
	$container = $this->controller->container( );
	return $container['values'][$page_name];
  }
}
