<?php

namespace App\Constants;

class Status {

    const ENABLE  = 1;
    const DISABLE = 0;

    const YES = 1;
    const NO  = 0;

    const VERIFIED   = 1;
    const UNVERIFIED = 0;
  
    

    const PAYMENT_INITIATE = 0;
    const PAYMENT_SUCCESS  = 1;
    const PAYMENT_PENDING  = 2;
    const PAYMENT_REJECT   = 3;

    const TICKET_OPEN   = 0;
    const TICKET_ANSWER = 1;
    const TICKET_REPLY  = 2;
    const TICKET_CLOSE  = 3;

    const PRIORITY_LOW    = 1;
    const PRIORITY_MEDIUM = 2;
    const PRIORITY_HIGH   = 3;

    const USER_ACTIVE = 1;
    const USER_BAN    = 0;

    const ROOM_TYPE_ACTIVE   = 1;
    const ROOM_TYPE_FEATURED = 1;

    const ROOM_ACTIVE    = 1;
    const ROOM_CANCELED = 3;
    const ROOM_CHECKOUT  = 9;

    const BOOKED_ROOM_ACTIVE    = 1;
    const BOOKED_ROOM_CANCELED = 3;
    const BOOKED_ROOM_NO_SHOW = 4;
    const BOOKED_ROOM_CHECKOUT  = 9;

    const BOOKING_ACTIVE    = 1;
    const BOOKING_CANCELED = 3;
    const BOOKING_NO_SHOW = 4;
    const BOOKING_CHECKOUT  = 9;

    const BOOKING_REQUEST_PENDING   = 0;
    const BOOKING_REQUEST_APPROVED  = 1;
    const BOOKING_REQUEST_NO_SHOW = 4;
    const BOOKING_REQUEST_CANCELED = 3;

    const KEY_NOT_GIVEN = 0;
    const KEY_GIVEN = 1;

    // v = Vacant o = Occupied r = Ready

    const PUBLISHED = 'published';
    const DRAFT = 'draft';

    const CLEAN = "Clean";
    const DIRTY = "Dirty";

    const VACANT = "Vacant";
    const OCCUPIED = "Occupied";

    const WEB_BOOKING = "Brand website";
    const PMS_BOOKING = "PMS";

    const DISCOUNT_FLAT = "Flat";
    const DISCOUNT_PERC = "Percentage";

    const CASH = "Cash";
    const CHEQUE = "Cheque";
    const ONLINE = "Card";
    const PAYMENT_LINK = "Link";

    const RESERVATION = "Reservation";
    const BOOKING = "Walk In";

    const SETTLE_PAYMENT = "Settle dues";
    const CASH_PAYMENT = "Cash payment";
    const CARD_PAYMENT = "Offline card payment";
    const CHEQUE_PAYMENT = "Offline cheque payment";
    const OTHER_PAYMENT = "Other payment sources";

    const EXPORT_REPORT = "Export report";
    const EXPORT_CSV = "CSV";
    const EXPORT_PDF = "PDF";
    const EXPORT_EXCEL = "Excel";

    const EMAIL_PDF = "Email as PDF";

    const AUTO = "AUTO";
    const MANUAL = "MANUAL";

    const AUDIT_HOURS = [
        '10:00 PM', '11:00 PM', '12:00 AM', '1:00 AM', '2:00 AM', '3:00 AM', '4:00 AM', '5:00 AM', '6:00 AM'
    ];

    const APPLY_CANCELLATION = "Apply Cancellation Policy";
    const NO_VOID = "Don't void";
    const CHARGE_ONE_NIGHT = "Charge 1 night and void remaining";
    const VOID = "Void all remaining charges";

    const NIGHT_AUDIT_PENDING = 0;
    const NIGHT_AUDIT_COMPLETED = 1;

    const BANK_OPEN = 1;
    const BANK_CLOSED  = 0;

    const TAX = "Tax and Fee";
    const CHARGE = "Charge";
}