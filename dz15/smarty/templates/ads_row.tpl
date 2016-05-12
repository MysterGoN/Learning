<tr>
    <td>{$ad->get_id()}</td>
    <td>{$ad->get_title()}</td>
    <td>{$ad->get_price()}</td>
    <td>{$ad->get_name()}</td>
    <td>
        <a  href='?id={$ad->get_id()|replace:'"':''}'>редактировать</a> |
        <a  href='?delete={$ad->get_id()|replace:'"':''}'>удалить</a>
    </td>
</tr>