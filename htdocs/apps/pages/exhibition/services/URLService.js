/**
 * Author:
 *
 * Dependencies:
 */

/* global define */

(function(factory)
{
	'use strict';

	if( typeof define === 'function' && define.amd )
	{
		define(['angular','lodash'], factory);
	}else{
		factory(angular, _);
	}
})(function(angular, _)
{
	'use strict';

	angular.module('URLService', [])

	.constant( 'ROUTES', {
		'exhibitions.detail' : '/exhibition/{id}/show',
		'exhibitions.index'  : '/exhibitions/index'
	})

	.factory('URL', ['ROUTES', function(ROUTES)
	{
		return {
			route : function( routeName, params )
			{
				if( angular.isUndefined(params)) return ROUTES[routeName];
				
				return _.reduce(params, function(acumulator, value, key)
				{
					var regexpr = new RegExp('{' + key + '}', 'gim');

					return acumulator.replace( regexpr, value );

				}, ROUTES[routeName]);
			}
		}
	}]);
});