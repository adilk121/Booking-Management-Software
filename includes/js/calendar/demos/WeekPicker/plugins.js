/////////////////// Plug-in file for CalendarXP 9.0 /////////////////
// This file is totally configurable. You may remove all the comments in this file to minimize the download size.
/////////////////////////////////////////////////////////////////////

///////////// Calendar Onchange Handler ////////////////////////////
// It's triggered whenever the calendar gets changed to y(ear),m(onth),d(ay)
// d = 0 means the calendar is about to switch to the month of (y,m); 
// d > 0 means a specific date [y,m,d] is about to be selected.
// e is a reference to the triggering event object
// Return a true value will cancel the change action.
// NOTE: DO NOT define this handler unless you really need to use it.
////////////////////////////////////////////////////////////////////
function fOnChange(y,m,d,e) {
	if (d>0) {
		_selDatesRange.length=0; // clear the week selection
		_selMonth.length=0; // clear the month selection
	}
	return false;  // return true to cancel the change.
}


///////////// Calendar AfterSelected Handler ///////////////////////
// It's triggered whenever a date gets fully selected.
// The selected date is passed in as y(ear),m(onth),d(ay)
// e is a reference to the triggering event object
// NOTE: DO NOT define this handler unless you really need to use it.
////////////////////////////////////////////////////////////////////
// function fAfterSelected(y,m,d,e) {}


///////////// Calendar Cell OnDrag Handler ///////////////////////
// It triggered when you try to drag a calendar cell. (y,m,d) is the cell date. 
// aStat = 0 means a mousedown is detected (dragstart)
// aStat = 1 means a mouseover between dragstart and dragend is detected (dragover)
// aStat = 2 means a mouseup is detected (dragend)
// e is a reference to the triggering event object
// NOTE: DO NOT define this handler unless you really need to use it.
////////////////////////////////////////////////////////////////////
// function fOnDrag(y,m,d,aStat,e) {}



////////////////// Calendar OnResize Handler ///////////////////////
// It's triggered after the calendar panel has finished drawing.
// NOTE: DO NOT define this handler unless you really need to use it.
////////////////////////////////////////////////////////////////////
// function fOnResize() {}


////////////////// Calendar fOnWeekClick Handler ///////////////////////
// It's triggered when the week number is clicked.
// NOTE: DO NOT define this handler unless you really need to use it.
////////////////////////////////////////////////////////////////////
function fOnWeekClick(year, weekNo) {
	_selDatesRange[0]=fW2Date(year,weekNo,1);
	_selDatesRange[1]=fW2Date(year,weekNo,7);
	_selMonth.length=0; // clear month
	gdCtrl.value=fFormatInput(0,0,0);
	fHideCal();	// or use fRepaint() to refresh the calendar
} 

////////////////// Calendar fIsSelected Callback ///////////////////////
// It's triggered for every date passed in as y(ear) m(onth) d(ay). And if 
// the return value is true, that date will be rendered using the giMarkSelected,
// gcFGSelected, gcBGSelected and guSelectedBGImg theme options.
// NOTE: If NOT defined here, the engine will create one that checks the gdSelect only.
////////////////////////////////////////////////////////////////////
function fIsSelected(y,m,d) {
	var dt=Date.UTC(y,m-1,d),s=_selDatesRange,sm=_selMonth;
	if (s.length>0)
		return dt>=Date.UTC(s[0][0],s[0][1]-1,s[0][2])&&dt<=Date.UTC(s[1][0],s[1][1]-1,s[1][2]);
	if (sm.length>0)
		return dt>=Date.UTC(sm[0],sm[1]-1,1)&&dt<=Date.UTC(sm[0],sm[1]-1,fGetDays(sm[0])[sm[1]]);
	else
		return gdSelect[2]==d&&gdSelect[1]==m&&gdSelect[0]==y;
}


////////////////// Calendar fParseInput Handler ///////////////////////
// Once defined, it'll be used to parse the input string stored in gdCtrl.value.
// It's expected to return an array of [y,m,d] to indicate the parsed date,
// or null if the input str can't be parsed as a date.
// NOTE: If NOT defined here, the engine will create one matching fParseDate().
////////////////////////////////////////////////////////////////////
function fParseInput(str) {
	var wk=str.split(_separator_week);
	if (wk.length==2) { // select all week days
		_selDatesRange[0]=fParseDate(wk[0]);
		_selDatesRange[1]=fParseDate(wk[1]);
		return _selDatesRange[0]; // return the 1st day of week so that the calendar can show up that month
	} else {
		var mth=str.split(_separator_month);
		if (mth.length==2) {
			_selMonth[0]=mth[giDatePos==2?0:1];
			_selMonth[1]=parseInt(mth[giDatePos==2?1:0],10);
			return [_selMonth[0],_selMonth[1],1];
		} else 
			return fParseDate(str);;
	}
}


////////////////// Calendar fFormatInput Handler ///////////////////////
// Once defined, it'll be used to format the selected date - y(ear) m(onth) d(ay)
// into gdCtrl.value.
// It's expected to return a formated date string.
// NOTE: If NOT defined here, the engine will create one matching fFormatDate().
////////////////////////////////////////////////////////////////////
function fFormatInput(y,m,d) {
	if (_selDatesRange.length>0) { // week selection
		return fFormatDate(_selDatesRange[0][0],_selDatesRange[0][1],_selDatesRange[0][2])+_separator_week
+fFormatDate(_selDatesRange[1][0],_selDatesRange[1][1],_selDatesRange[1][2]);
	} else if (_selMonth.length>0) { // month selection
		return padZero(_selMonth[giDatePos==2?0:1])+_separator_month+padZero(_selMonth[giDatePos==2?1:0]);
	} else { // date selection
		return fFormatDate(y,m,d);
	}
}

////////////////// Calendar fOnload Handler ///////////////////////
// It's triggered when the calendar engine is fully loaded by the browser.
// NOTE: DO NOT define this handler unless you really need to use it.
////////////////////////////////////////////////////////////////////
// function fOnload() {}


// ====== predefined utility functions for use with agendas. ========

// load an url in the window/frame designated by "framename".
function popup(url,framename) {	
	var w=parent.open(url,framename,"top=200,left=200,width=400,height=200,scrollbars=1,resizable=1");
	if (w&&url.split(":")[0]=="mailto") w.close();
	else if (w&&!framename) w.focus();
}

// ====== Following are self-defined and/or custom-built functions! =======
var _separator_week=" - ";	// separator char that sits between the year and week number
var _selDatesRange=[];	//  a 2-element array contains the first week day and the last week day in format [y,m,d]
var _separator_month=gsSplit;	// separator char that sits between the year and month
var _selMonth=[];


giWeekCol=0;	// set to show the week number column
// override gsBottom to add the month picker
gsBottom="<A id='bottomAnchor' href='javascript:void(0)' class='BottomAnchor' onclick='if(this.blur)this.blur();fOnSelectMon();return false;' onmouseover='return true;' >the whole month</A>";

function fOnSelectMon() {
	_selMonth[0]=gCurMonth[0];
	_selMonth[1]=gCurMonth[1];
	_selDatesRange.length=0; // clear week
	gdCtrl.value=fFormatInput(0,0,0);
	fHideCal();
}

function padZero(n) {
	return n<10?"0"+n:n;
}
