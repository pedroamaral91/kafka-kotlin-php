package com.cleanarchkotlin.data.usecases

import com.cleanarchkotlin.data.contracts.ListUser
import com.cleanarchkotlin.data.contracts.ListUserRepository
import com.cleanarchkotlin.data.dto.UserDTO
import javax.enterprise.context.RequestScoped
import javax.inject.Inject

@RequestScoped
class DbListUser @Inject constructor(
    private val listUserRepository: ListUserRepository
) : ListUser {
    override fun list(): List<UserDTO> {
        return listUserRepository.list()
    }
}