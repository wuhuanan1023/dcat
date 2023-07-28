<?php

/**
 * A helper file for Dcat Admin, to provide autocomplete information to your IDE
 *
 * This file should not be included in your code, only analyzed by your IDE!
 *
 * @author jqh <841324345@qq.com>
 */
namespace Dcat\Admin {
    use Illuminate\Support\Collection;

    /**
     * @property Grid\Column|Collection id
     * @property Grid\Column|Collection name
     * @property Grid\Column|Collection type
     * @property Grid\Column|Collection version
     * @property Grid\Column|Collection detail
     * @property Grid\Column|Collection created_at
     * @property Grid\Column|Collection updated_at
     * @property Grid\Column|Collection is_enabled
     * @property Grid\Column|Collection parent_id
     * @property Grid\Column|Collection order
     * @property Grid\Column|Collection icon
     * @property Grid\Column|Collection uri
     * @property Grid\Column|Collection extension
     * @property Grid\Column|Collection permission_id
     * @property Grid\Column|Collection menu_id
     * @property Grid\Column|Collection slug
     * @property Grid\Column|Collection http_method
     * @property Grid\Column|Collection http_path
     * @property Grid\Column|Collection role_id
     * @property Grid\Column|Collection user_id
     * @property Grid\Column|Collection value
     * @property Grid\Column|Collection username
     * @property Grid\Column|Collection password
     * @property Grid\Column|Collection avatar
     * @property Grid\Column|Collection remember_token
     * @property Grid\Column|Collection platform_id
     * @property Grid\Column|Collection app_id
     * @property Grid\Column|Collection contact_name
     * @property Grid\Column|Collection contact_phone
     * @property Grid\Column|Collection sort
     * @property Grid\Column|Collection status
     * @property Grid\Column|Collection deleted_ts
     * @property Grid\Column|Collection created_ts
     * @property Grid\Column|Collection updated_ts
     * @property Grid\Column|Collection webhook
     * @property Grid\Column|Collection secret
     * @property Grid\Column|Collection modify_ts
     * @property Grid\Column|Collection data
     * @property Grid\Column|Collection request_ip
     * @property Grid\Column|Collection request_id
     * @property Grid\Column|Collection msg
     * @property Grid\Column|Collection level
     * @property Grid\Column|Collection error_code
     * @property Grid\Column|Collection content
     * @property Grid\Column|Collection notice_ts
     * @property Grid\Column|Collection app_name
     * @property Grid\Column|Collection app_key
     * @property Grid\Column|Collection app_secret
     * @property Grid\Column|Collection remark
     * @property Grid\Column|Collection connection
     * @property Grid\Column|Collection queue
     * @property Grid\Column|Collection payload
     * @property Grid\Column|Collection exception
     * @property Grid\Column|Collection failed_at
     * @property Grid\Column|Collection email
     * @property Grid\Column|Collection token
     * @property Grid\Column|Collection admin_id
     * @property Grid\Column|Collection request_url
     * @property Grid\Column|Collection request_data
     * @property Grid\Column|Collection response_data
     * @property Grid\Column|Collection domain
     * @property Grid\Column|Collection server_name
     * @property Grid\Column|Collection server_code
     * @property Grid\Column|Collection servre_uname
     * @property Grid\Column|Collection server_pos
     * @property Grid\Column|Collection server_ip
     * @property Grid\Column|Collection server_intranet_ip
     * @property Grid\Column|Collection email_verified_at
     *
     * @method Grid\Column|Collection id(string $label = null)
     * @method Grid\Column|Collection name(string $label = null)
     * @method Grid\Column|Collection type(string $label = null)
     * @method Grid\Column|Collection version(string $label = null)
     * @method Grid\Column|Collection detail(string $label = null)
     * @method Grid\Column|Collection created_at(string $label = null)
     * @method Grid\Column|Collection updated_at(string $label = null)
     * @method Grid\Column|Collection is_enabled(string $label = null)
     * @method Grid\Column|Collection parent_id(string $label = null)
     * @method Grid\Column|Collection order(string $label = null)
     * @method Grid\Column|Collection icon(string $label = null)
     * @method Grid\Column|Collection uri(string $label = null)
     * @method Grid\Column|Collection extension(string $label = null)
     * @method Grid\Column|Collection permission_id(string $label = null)
     * @method Grid\Column|Collection menu_id(string $label = null)
     * @method Grid\Column|Collection slug(string $label = null)
     * @method Grid\Column|Collection http_method(string $label = null)
     * @method Grid\Column|Collection http_path(string $label = null)
     * @method Grid\Column|Collection role_id(string $label = null)
     * @method Grid\Column|Collection user_id(string $label = null)
     * @method Grid\Column|Collection value(string $label = null)
     * @method Grid\Column|Collection username(string $label = null)
     * @method Grid\Column|Collection password(string $label = null)
     * @method Grid\Column|Collection avatar(string $label = null)
     * @method Grid\Column|Collection remember_token(string $label = null)
     * @method Grid\Column|Collection platform_id(string $label = null)
     * @method Grid\Column|Collection app_id(string $label = null)
     * @method Grid\Column|Collection contact_name(string $label = null)
     * @method Grid\Column|Collection contact_phone(string $label = null)
     * @method Grid\Column|Collection sort(string $label = null)
     * @method Grid\Column|Collection status(string $label = null)
     * @method Grid\Column|Collection deleted_ts(string $label = null)
     * @method Grid\Column|Collection created_ts(string $label = null)
     * @method Grid\Column|Collection updated_ts(string $label = null)
     * @method Grid\Column|Collection webhook(string $label = null)
     * @method Grid\Column|Collection secret(string $label = null)
     * @method Grid\Column|Collection modify_ts(string $label = null)
     * @method Grid\Column|Collection data(string $label = null)
     * @method Grid\Column|Collection request_ip(string $label = null)
     * @method Grid\Column|Collection request_id(string $label = null)
     * @method Grid\Column|Collection msg(string $label = null)
     * @method Grid\Column|Collection level(string $label = null)
     * @method Grid\Column|Collection error_code(string $label = null)
     * @method Grid\Column|Collection content(string $label = null)
     * @method Grid\Column|Collection notice_ts(string $label = null)
     * @method Grid\Column|Collection app_name(string $label = null)
     * @method Grid\Column|Collection app_key(string $label = null)
     * @method Grid\Column|Collection app_secret(string $label = null)
     * @method Grid\Column|Collection remark(string $label = null)
     * @method Grid\Column|Collection connection(string $label = null)
     * @method Grid\Column|Collection queue(string $label = null)
     * @method Grid\Column|Collection payload(string $label = null)
     * @method Grid\Column|Collection exception(string $label = null)
     * @method Grid\Column|Collection failed_at(string $label = null)
     * @method Grid\Column|Collection email(string $label = null)
     * @method Grid\Column|Collection token(string $label = null)
     * @method Grid\Column|Collection admin_id(string $label = null)
     * @method Grid\Column|Collection request_url(string $label = null)
     * @method Grid\Column|Collection request_data(string $label = null)
     * @method Grid\Column|Collection response_data(string $label = null)
     * @method Grid\Column|Collection domain(string $label = null)
     * @method Grid\Column|Collection server_name(string $label = null)
     * @method Grid\Column|Collection server_code(string $label = null)
     * @method Grid\Column|Collection servre_uname(string $label = null)
     * @method Grid\Column|Collection server_pos(string $label = null)
     * @method Grid\Column|Collection server_ip(string $label = null)
     * @method Grid\Column|Collection server_intranet_ip(string $label = null)
     * @method Grid\Column|Collection email_verified_at(string $label = null)
     */
    class Grid {}

    class MiniGrid extends Grid {}

    /**
     * @property Show\Field|Collection id
     * @property Show\Field|Collection name
     * @property Show\Field|Collection type
     * @property Show\Field|Collection version
     * @property Show\Field|Collection detail
     * @property Show\Field|Collection created_at
     * @property Show\Field|Collection updated_at
     * @property Show\Field|Collection is_enabled
     * @property Show\Field|Collection parent_id
     * @property Show\Field|Collection order
     * @property Show\Field|Collection icon
     * @property Show\Field|Collection uri
     * @property Show\Field|Collection extension
     * @property Show\Field|Collection permission_id
     * @property Show\Field|Collection menu_id
     * @property Show\Field|Collection slug
     * @property Show\Field|Collection http_method
     * @property Show\Field|Collection http_path
     * @property Show\Field|Collection role_id
     * @property Show\Field|Collection user_id
     * @property Show\Field|Collection value
     * @property Show\Field|Collection username
     * @property Show\Field|Collection password
     * @property Show\Field|Collection avatar
     * @property Show\Field|Collection remember_token
     * @property Show\Field|Collection platform_id
     * @property Show\Field|Collection app_id
     * @property Show\Field|Collection contact_name
     * @property Show\Field|Collection contact_phone
     * @property Show\Field|Collection sort
     * @property Show\Field|Collection status
     * @property Show\Field|Collection deleted_ts
     * @property Show\Field|Collection created_ts
     * @property Show\Field|Collection updated_ts
     * @property Show\Field|Collection webhook
     * @property Show\Field|Collection secret
     * @property Show\Field|Collection modify_ts
     * @property Show\Field|Collection data
     * @property Show\Field|Collection request_ip
     * @property Show\Field|Collection request_id
     * @property Show\Field|Collection msg
     * @property Show\Field|Collection level
     * @property Show\Field|Collection error_code
     * @property Show\Field|Collection content
     * @property Show\Field|Collection notice_ts
     * @property Show\Field|Collection app_name
     * @property Show\Field|Collection app_key
     * @property Show\Field|Collection app_secret
     * @property Show\Field|Collection remark
     * @property Show\Field|Collection connection
     * @property Show\Field|Collection queue
     * @property Show\Field|Collection payload
     * @property Show\Field|Collection exception
     * @property Show\Field|Collection failed_at
     * @property Show\Field|Collection email
     * @property Show\Field|Collection token
     * @property Show\Field|Collection admin_id
     * @property Show\Field|Collection request_url
     * @property Show\Field|Collection request_data
     * @property Show\Field|Collection response_data
     * @property Show\Field|Collection domain
     * @property Show\Field|Collection server_name
     * @property Show\Field|Collection server_code
     * @property Show\Field|Collection servre_uname
     * @property Show\Field|Collection server_pos
     * @property Show\Field|Collection server_ip
     * @property Show\Field|Collection server_intranet_ip
     * @property Show\Field|Collection email_verified_at
     *
     * @method Show\Field|Collection id(string $label = null)
     * @method Show\Field|Collection name(string $label = null)
     * @method Show\Field|Collection type(string $label = null)
     * @method Show\Field|Collection version(string $label = null)
     * @method Show\Field|Collection detail(string $label = null)
     * @method Show\Field|Collection created_at(string $label = null)
     * @method Show\Field|Collection updated_at(string $label = null)
     * @method Show\Field|Collection is_enabled(string $label = null)
     * @method Show\Field|Collection parent_id(string $label = null)
     * @method Show\Field|Collection order(string $label = null)
     * @method Show\Field|Collection icon(string $label = null)
     * @method Show\Field|Collection uri(string $label = null)
     * @method Show\Field|Collection extension(string $label = null)
     * @method Show\Field|Collection permission_id(string $label = null)
     * @method Show\Field|Collection menu_id(string $label = null)
     * @method Show\Field|Collection slug(string $label = null)
     * @method Show\Field|Collection http_method(string $label = null)
     * @method Show\Field|Collection http_path(string $label = null)
     * @method Show\Field|Collection role_id(string $label = null)
     * @method Show\Field|Collection user_id(string $label = null)
     * @method Show\Field|Collection value(string $label = null)
     * @method Show\Field|Collection username(string $label = null)
     * @method Show\Field|Collection password(string $label = null)
     * @method Show\Field|Collection avatar(string $label = null)
     * @method Show\Field|Collection remember_token(string $label = null)
     * @method Show\Field|Collection platform_id(string $label = null)
     * @method Show\Field|Collection app_id(string $label = null)
     * @method Show\Field|Collection contact_name(string $label = null)
     * @method Show\Field|Collection contact_phone(string $label = null)
     * @method Show\Field|Collection sort(string $label = null)
     * @method Show\Field|Collection status(string $label = null)
     * @method Show\Field|Collection deleted_ts(string $label = null)
     * @method Show\Field|Collection created_ts(string $label = null)
     * @method Show\Field|Collection updated_ts(string $label = null)
     * @method Show\Field|Collection webhook(string $label = null)
     * @method Show\Field|Collection secret(string $label = null)
     * @method Show\Field|Collection modify_ts(string $label = null)
     * @method Show\Field|Collection data(string $label = null)
     * @method Show\Field|Collection request_ip(string $label = null)
     * @method Show\Field|Collection request_id(string $label = null)
     * @method Show\Field|Collection msg(string $label = null)
     * @method Show\Field|Collection level(string $label = null)
     * @method Show\Field|Collection error_code(string $label = null)
     * @method Show\Field|Collection content(string $label = null)
     * @method Show\Field|Collection notice_ts(string $label = null)
     * @method Show\Field|Collection app_name(string $label = null)
     * @method Show\Field|Collection app_key(string $label = null)
     * @method Show\Field|Collection app_secret(string $label = null)
     * @method Show\Field|Collection remark(string $label = null)
     * @method Show\Field|Collection connection(string $label = null)
     * @method Show\Field|Collection queue(string $label = null)
     * @method Show\Field|Collection payload(string $label = null)
     * @method Show\Field|Collection exception(string $label = null)
     * @method Show\Field|Collection failed_at(string $label = null)
     * @method Show\Field|Collection email(string $label = null)
     * @method Show\Field|Collection token(string $label = null)
     * @method Show\Field|Collection admin_id(string $label = null)
     * @method Show\Field|Collection request_url(string $label = null)
     * @method Show\Field|Collection request_data(string $label = null)
     * @method Show\Field|Collection response_data(string $label = null)
     * @method Show\Field|Collection domain(string $label = null)
     * @method Show\Field|Collection server_name(string $label = null)
     * @method Show\Field|Collection server_code(string $label = null)
     * @method Show\Field|Collection servre_uname(string $label = null)
     * @method Show\Field|Collection server_pos(string $label = null)
     * @method Show\Field|Collection server_ip(string $label = null)
     * @method Show\Field|Collection server_intranet_ip(string $label = null)
     * @method Show\Field|Collection email_verified_at(string $label = null)
     */
    class Show {}

    /**
     
     */
    class Form {}

}

namespace Dcat\Admin\Grid {
    /**
     
     */
    class Column {}

    /**
     
     */
    class Filter {}
}

namespace Dcat\Admin\Show {
    /**
     
     */
    class Field {}
}
