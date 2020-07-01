<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* Name:  Ion Auth Lang - Greek
*
* Author: Vagelis Papaloukas
* 		  vagelispapalou@yahoo.gr
*
* Location: http://github.com/benedmunds/ion_auth/
*
* Created:  02.04.2011
*
* Description:  Greek language file for Ion Auth messages and errors
*
*/

// Account Creation
$lang['account_creation_successful'] 	  	 = 'Ο Λογαριασμός Δημιουργήθηκε Επιτυχώς';
$lang['account_creation_unsuccessful'] 	 	 = 'Αποτυχία Δημιουργίας Λογαριασμού';
$lang['account_creation_duplicate_email'] 	 = 'Το Email χρησιμποιείται ήδη ή είναι λάθος';
$lang['account_creation_duplicate_identity'] 	 = 'Ο Χρήστης υπάρχει ήδη ή είναι λάθος';

// TODO Please Translate
$lang['account_creation_missing_default_group'] = 'Δεν έχει οριστεί η προεπιλεγμένη ομάδα';
$lang['account_creation_invalid_default_group'] = 'Μη έγκυρο όνομα ομάδας';


// Password
$lang['password_change_successful'] 	 	 = 'Επιτυχής Αλλαγή Κωδικού';
$lang['password_change_unsuccessful'] 	  	 = 'Αδυναμία Αλλαγής Κωδικού';
$lang['forgot_password_successful'] 	 	 = 'Εστάλη Email Κωδικού Επαναφοράς';
$lang['forgot_password_unsuccessful'] 	 	 = 'Αδυναμία Επαναφοράς Κωδικού';

// Activation
$lang['activate_successful'] 		  	 = 'Ο Λογαριασμός Ενεργοποιήθηκε';
$lang['activate_unsuccessful'] 		 	 = 'Αδυναμία Ενεργοποίησης Λογαριασμού';
$lang['deactivate_successful'] 		  	 = 'Ο Λογαριασμός Απενεργοποιήθηκε';
$lang['deactivate_unsuccessful'] 	  	 = 'Αδυναμία Απενεργοποίησης Λογαριασμού';
$lang['activation_email_successful'] 	  	 = 'Εστάλη Email Ενεργοποίησης Λογαριασμού';
$lang['activation_email_unsuccessful']   	 = 'Αδυναμία Αποστολής Email Ενεργοποίησης';

// Login / Logout
$lang['login_successful'] 		  	 = 'Συνδεθήκατε Επιτυχώς';
$lang['login_unsuccessful'] 		  	 = 'Λάθος Στοιχεία';
$lang['login_unsuccessful_not_active'] 		 = 'Ο λογαριασμός είναι ανενεργός';
$lang['login_timeout']                       = 'Προσωρινά κλειδωμένο. Προσπαθήστε ξανά αργότερα.';
$lang['logout_successful'] 		 	 = 'Αποσυνδεθήκατε Επιτυχώς';

// Account Changes
$lang['update_successful'] 		 	 = 'Οι Πληροφορίες του Λογαριασμού Ενημερώθηκαν Επιτυχώς';
$lang['update_unsuccessful'] 		 	 = 'Αδυναμία Ενημέρωσης Πληροφοριών Λογαριασμού';
$lang['delete_successful'] 		 	 = 'Ο Χρήστης Διαγράφηκε';
$lang['delete_unsuccessful'] 		 	 = 'Αδυναμία Διαγραφής Χρήστη';
$lang['deactivate_current_user_unsuccessful']= 'You cannot De-Activate your self.';

// Groups
$lang['group_creation_successful']  = 'Η ομάδα δημιουργήθηκε με επιτυχία';
$lang['group_already_exists']       = 'Έχει ήδη ληφθεί όνομα ομάδας';
$lang['group_update_successful']    = 'Τα στοιχεία της ομάδας ενημερώθηκαν';
$lang['group_delete_successful']    = 'Η ομάδα διαγράφηκε';
$lang['group_delete_unsuccessful'] 	= 'Δεν είναι δυνατή η διαγραφή ομάδας';
$lang['group_delete_notallowed']    = 'Δεν είναι δυνατή η διαγραφή της ομάδας διαχειριστών';
$lang['group_name_required'] 		= 'Το όνομα ομάδας είναι υποχρεωτικό πεδίο';
$lang['group_name_admin_not_alter'] = 'Το όνομα ομάδας διαχειριστή δεν μπορεί να αλλάξει';

// Activation Email
$lang['email_activation_subject']            = 'Ενεργοποίηση Λογαριασμού';
$lang['email_activate_heading']    = 'Ενεργοποίηση λογαριασμού για %s';
$lang['email_activate_subheading'] = 'Κάντε κλικ σε αυτόν το σύνδεσμο %s.';
$lang['email_activate_link']       = 'Ενεργοποίησε το λογαριασμό σου';
// Forgot Password Email
$lang['email_forgotten_password_subject']    = 'Ξεχασμένη επαλήθευση κωδικού πρόσβασης';
$lang['email_forgot_password_heading']    = 'Επαναφορά κωδικού πρόσβασης για %s';
$lang['email_forgot_password_subheading'] = 'Κάντε κλικ σε αυτόν το σύνδεσμο %s.';
$lang['email_forgot_password_link']       = 'Επαναφορά του κωδικού πρόσβασής σας';
